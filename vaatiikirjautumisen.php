<!DOCTYPE html>
<html>
<head><title>Redirect</title></head>
<body>
<?php
session_start();

if (!isset($_SESSION["user_ok"])) {
    $_SESSION["paluuosoite"]="vaatiikirjautumisen.php";
    header("Location:kirjaudu.php");
    exit;
}

    print "onnistui";


<p>Kirjautuminen ok! Voit nyt tarkastella FAQ-juttuja ja vastata niihin.</p>


$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
print "ei onnistu";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

$sql="select * from parketti_faq";
$stmt=mysqli_prepare($yhteys, $sql);
$tulos=mysqli_stmt_get_result($stmt);

?>
</body>
</html>