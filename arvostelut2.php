 <?php

$message="Toimii";

$json=$_POST['arvostelu'];
$arvostelu=json_decode($json, false);

$nickanme=$nickname->nickname;
$kaupunki=$kaupunki->kaupunki;
$atextarea=$atextarea->atextarea;
$rating=$rating->rating;

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
    return;
}

// Tarkistetaan onko arvot tyhjiä
if (empty($nickname) || empty($kaupunki) || empty($atextarea) || empty($rating)) {
   print "Täytä kaikki tiedot.";
   return;
}


$sql="insert into parketti_arvostelu(nickname, kaupunki, atextarea, rating) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'ssss', $kala->laji, $kala->paino, $kala->pituus);
mysqli_stmt_execute($stmt);
    
// Suljetaan statement
mysqli_stmt_close($stmt);
// Suljetaan SQL-yhteys
mysqli_close($yhteys);
print "Tiedot on tallennettu tietokantaan.";
print $message;

exit;
    
?>