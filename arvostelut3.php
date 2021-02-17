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

while ($rivi=mysqli_fetch_object($tulos)) {
	print "<center>Nickname: $rivi->nimimerkki<br> Kohdekaupunki: $rivi->kohdekaupunki<br> Arvostelu: $rivi->arvostelu <br> Arvosana: $rivi->arvosana<br><br></center>";
}


// mysqli_close($yhteys);



?>
<h2>Testi table</h2>

<table>
    <tr>
        <th>Nickname</th>
        <th>Destination</th>
        <th>Review</th>
        <th>Rating (0-3)</th> 
    </tr>
    <?php while($rivi = mysqli_fetch_array($tulos)) { ?>
        <tr>
            <td><?php echo $rivi["nimimerkki"] ?></td>
            <td><?php echo $rivi["kohdekaupunki"] ?></td>
            <td><?php echo $rivi["arvostelu"] ?></td>
            <td><?php echo $rivi["arvosana"] ?></td>
        </tr>

    <?php } ?>
</table>
    
</body>
</html>