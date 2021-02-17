<?php

$city = "";

if (isset ($_POST["sweden"]) && ($_POST["sweden"]) != "City") {
    $city = $_POST["sweden"];
}
if (isset ($_POST["norway"]) && ($_POST["norway"]) != "City") {
    $city = $_POST["norway"];
}
if (isset ($_POST["russia"]) && ($_POST["russia"]) != "City") {
    $city = $_POST["russia"];
}
if (isset ($_POST["finland"]) && ($_POST["finland"]) != "City") {
    $city = $_POST["finland"];
}
$holidaytype = "";
if (isset ($_POST["holidaytype"])) {
    $holidaytype = $_POST["holidaytype"];
}
$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

if (!$yhteys) {
    $error="Can't connect to database.";
print $error;
return;
}

$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
if (!$tietokanta) {
    $error="Can't choose database.";
print $error;
return;
}

$tulos=mysqli_query($yhteys, "select * from parketti_hinnat where pituus = '".$holidaytype."' and kaupunki = '".$city."'");

while ($rivi=mysqli_fetch_object($tulos)){
    print "Price : $rivi->hinta €";
}

mysqli_close($yhteys);

?>