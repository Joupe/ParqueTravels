<?php
$kysymys=(isset($_POST["kysymys"]) ? $_POST["kysymys"] : "");

$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
    print "Yhteysvirhe";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
$sql="insert into parketti_faq values(?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "s", $kysymys);
mysqli_stmt_execute($stmt);
?>