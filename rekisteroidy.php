<?php
if (isset($_POST["tunnus"]) && isset($_POST["salasana"])) {
    $tunnus=$_POST["tunnus"];
    $salasana=$_POST["salasana"];
}
else{
    header("Location:teetunnus.html");
    exit;
}

$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    print "ei onnistu yhteys";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
$sql="insert into parketti_tunnukset values(?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ss", $tunnus, md5($salasana));
mysqli_stmt_execute($stmt);

header("Location:tunnuskiitos.html");
exit;
?>