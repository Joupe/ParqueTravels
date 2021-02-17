<?php

$kohdemaa=$_POST["country"];
$kohdekaupunki=$_POST[$kohdemaa];
$matkan_pituus=$_POST["customRadio"];
$etunimi=$_POST["inputFName"];
$sukunimi=$_POST["inputLName"];
$osoite=$_POST["inputAddress"];
$kaupunki=$_POST["inputCity"];
$postinumero=$_POST["inputZip"];
$email=$_POST["inputEmail4"];



$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
 if (!$yhteys){
 	die("Unable to connect".mysqli_error());
 }

 $tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
 if (!$tietokanta) {
     die("Choosing the database failed: " . mysqli_connect_error());
 }

$tulos=mysqli_query($yhteys, "select * from parketti_hinnat where pituus = '".$matkan_pituus."' and kaupunki = '".$kohdekaupunki."'");

while ($rivi=mysqli_fetch_object($tulos)) {
    $hinta=$rivi->hinta;
}

print("$kohdemaa, $kohdekaupunki, $matkan_pituus, $hinta, $etunimi, $sukunimi, $osoite, $kaupunki, $postinumero, $email");

if(isset($_POST["submitf"])){ 

    $sql = "INSERT INTO parketti_varaukset(kohdemaa, kohdekaupunki, matkan_pituus, hinta, etunimi, sukunimi, osoite, kaupunki, postinumero, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $kohdemaa, $kohdekaupunki, $matkan_pituus, $hinta, $etunimi, $sukunimi, $osoite, $kaupunki, $postinumero, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  
}

  header("Location:kiitos.html");
  mysqli_close($yhteys);

exit;
?>