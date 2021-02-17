<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testi tietokanansta lukeminen</title>
</head>
<body>

<h2>Arvostelut demo tietokannasta</h2>
<table border="1px">
    <tr>
        <th>Nickname</th>
        <th>Destination</th>
        <th>Review</th>
        <th>Grade</th>
    </tr>
<?php
// Koodin tarkoitus on ottaa tietokannasta arvostelut ja näyttää websivulle mitä siellä on

// Tietokantaan yhteys
$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

// Tarkistetaan tietokannan yhteys
if (!$yhteys) {
    print "404";
    }

// Tietokannan valitseminen
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

if(!$tietokanta) {
    die("Tietokannan valinta epäonnistui: " .mysql_connect_error());
    exit;
}
// echo "Tietokanta on OK."; // debug

$sql ="select * from parketti_arvostelut";
$tulos=mysqli_query($yhteys, $sql);

// if rivejä enemmän kuin  niin tulee taulukko
while ($rivi=mysqli_fetch_assoc($tulos)) {
	echo "<tr><td>". $rivi["nimimerkki"]. "</td><td>". $rivi["kohdekaupunki"]."</td><td>". 
    $rivi["arvostelu"]. "</td><td>". $rivi["arvosana"]. "</td></tr>";
    }
    echo "</table>";
 // else{
 // echo("0 results from the database")   
 // }


mysqli_close($yhteys);

?>

<h2>Testi table</h2>


    
</body>
</html>