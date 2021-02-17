<?php

$kohdemaa=$_POST["country"];
$kohdekaupunki=$_POST[$kohdemaa];
$matkan_pituus=$_POST["customRadio"];
//$hinta=$_POST["kohdemaa"];
$etunimi=$_POST["inputFName"];
$sukunimi=$_POST["inputLName"];
$osoite=$_POST["inputAddress"];
$kaupunki=$_POST["inputCity"];
$postinumero=$_POST["inputZip"];
$email=$_POST["inputEmail4"];
print("$kohdemaa, $kohdekaupunki, $matkan_pituus, $etunimi, $sukunimi, $osoite, $kaupunki, $postinumero, $email");

$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
 if (!$yhteys){
 	die("Unable to connect".mysqli_error());
 }

 $tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
 if (!$tietokanta) {
     die("Choosing the database failed: " . mysqli_connect_error());
 }

$kohdemaa=$_POST["country"];
$kohdekaupunki=$_POST[$kohdemaa];
$matkan_pituus=$_POST["customRadio"];
//$hinta=$_POST["kohdemaa"];
$etunimi=$_POST["inputFName"];
$sukunimi=$_POST["inputLName"];
$osoite=$_POST["inputAddress"];
$kaupunki=$_POST["inputCity"];
$postinumero=$_POST["inputZip"];
$email=$_POST["inputEmail4"];

if(isset($_POST["submitf"])){
    $sql = "INSERT INTO parketti_varaukset(kohdemaa, kohdekaupunki, matkan_pituus, hinta, etunimi, sukunimi, osoite, kaupunki, postinumero, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $kohdemaa, $kohdekaupunki, $matkan_pituus, $hinta, $etunimi, $sukunimi, $osoite, $kaupunki, $postinumero, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($yhteys);
}
exit;
?>
