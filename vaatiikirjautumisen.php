<!DOCTYPE html>
<html>
<head>
<title>Kysymykset</title>
<link rel="stylesheet" type="text/css" href="css/finland.css">
<link rel="stylesheet" type="text/css" href="css/new.css">
</head>
<body>
<h1>ParqueTravels Admin page</h1>
<?php
session_start();

if (!isset($_SESSION["user_ok"])) {
    $_SESSION["paluuosoite"]="vaatiikirjautumisen.php";
    header("Location:kirjaudu.php");
    exit;
}

    print "<center>Kysymykset sivustolta:<br></center><br>";

$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
print "ei onnistu";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

$tulos=mysqli_query($yhteys, "select * from parketti_faq");

while ($rivi=mysqli_fetch_object($tulos)) {
	print "<center>id=$rivi->id kysymys=$rivi->kysymys<br></center>";
}
mysqli_close($yhteys);
?>

<form action="vaatiikirjautumisen.php" method="post">
      <h3>Vastaa kysymykseen ja vie se FAQ-sivulle</h3><br>
      Kysymys:<input type="text" name="kysmari" value='' size="75"><br>
      Vastaus:<input type="text" name="vastaus" value='' size="75"><br>
      <br>
      <input type="submit" name="ok" value="Send"><br>
</form>
<?php
$kysmari=(isset($_POST["kysmari"]) ? $_POST["kysmari"] : "");
$vastaus=(isset($_POST["vastaus"]) ? $_POST["vastaus"] : "");

if (!empty($kysmari) && (!empty($vastaus))) {
$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    print "Yhteysvirhe";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
$sql="insert into parketti_kysjavas (kysmari, vastaus) values(?,?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ss", $kysmari, $vastaus);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
exit;
}
?>
</body>
</html>