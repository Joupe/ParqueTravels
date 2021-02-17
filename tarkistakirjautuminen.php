<?php
session_start();
if (isset($_POST["tunnus"]) && isset($_POST["salasana"])) {
    $tunnus=$_POST["tunnus"];
    $salasana=$_POST["salasana"];
}
else{
    header("Location:virhekirjautuminen.html");
    exit;
}

$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
print "ei onnistu";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

$sql="select * from parketti_tunnukset where tunnus=? and salasana=md5(?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ss", $tunnus, $salasana);
mysqli_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);


if ($rivi=mysqli_fetch_object($tulos)) {
    $_SESSION["user_ok"]="jees";	
    header("Location:vaatiikirjautumisen.php");
    exit;
}
else{
    header("Location:kirjaudu.php");
    exit;
}

?>