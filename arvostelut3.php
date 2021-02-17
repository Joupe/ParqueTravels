<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testi tietokanansta lukeminen</title>
</head>
<body>

<?php
// Koodin tarkoitus on ottaa tietokannasta arvostelut ja näyttää websivulle mitä siellä on

// Tietokantaan yhteys
$yhteys = mysqli_connect("localhost","trtkp20a3","trtkp20a3passwd");

// Tarkistetaan tietokannan yhteys
if (!$yhteys) {
    die("Yhteyden muodostaminen epäonnistui: " .mysql_connect_error());
    return;
}

// Tietokannan valitseminen
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

if(!$tietokanta) {
    die("Tietokannan valinta epäonnistui: " .mysql_connect_error());
    exit;
}
echo "Tietokanta on OK."; // debug

// Query tietokannalle
$tulos=mysqli_query("select * from parketti_arvostelut");

while ($rivi=mysqli_fetch_object($tulos)){
    print "nimimerkki=$rivi->nimimerkki kohdekaupunki=$rivi->kohdekaupunki arvostelu=$rivi->arvostelu arvosana=$rivi->arvosana <br>"
}

// Suljetaan statement
mysqli_stmt_close($stmt);
// Suljetaan SQL-yhteys
mysqli_close($yhteys);

?>
    
</body>
</html>