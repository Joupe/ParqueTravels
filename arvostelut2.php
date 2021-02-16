 <?php

$message="Toimii";

$json=$_POST['arvostelu'];
$arvostelu=json_decode($json, false);

$nickname=$nickname->nickname;
$kaupunki=$kaupunki->kaupunki;
$atextarea=$atextarea->atextarea;
$rating=$rating->rating;

// Tietokantaan yhteys
$yhteys = mysqli_connect("localhost","trtkp20a3","trtkp20a3passwd");

// Tarkistetaan tietokannan yhteys
if (!$yhteys) {
    die("Yhteyden muodostaminen epäonnistui: " .mysql_connect_error());
    print "Yhteyden muodostaminen epäonnistui";
    return;
}

// Tietokannan valitseminen
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

if(!$tietokanta) {
    die("Tietokannan valinta epäonnistui: " .mysql_connect_error());
    print "Tietokannan valinta epäonnistui"
    return;
}

// Tarkistetaan onko arvot tyhjiä
if (empty($nickname) || empty($kaupunki) || empty($atextarea) || empty($rating)) {
   print "Täytä kaikki tiedot.";
   return;
}


$sql="insert into parketti_arvostelut(nimimerkki, kohdekaupunki, arvostelu, arvosana) values(?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'sssi', $arvostelu->nickname, $arvostelu->kaupunki, $arvostelu->atextarea, $arvostelu->rating);
mysqli_stmt_execute($stmt);

// Suljetaan statement
mysqli_stmt_close($stmt);
// Suljetaan SQL-yhteys
mysqli_close($yhteys);
print "Tiedot ovat tallennettu tietokantaan.";
echo "Tiedot ovat tallennettu!";
print $message;

exit;
    
?>