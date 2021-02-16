<?php
set_error_handler("anyError", E_ALL);

$error="Thank you for joining the ParqueTravels email list!";

$email=$_POST["email"];

if (empty($email)) {
$error = "Insert your email address.";
print $error;
return;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Insert a working email address.";
print $error;
return;
}


$yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");

if (!$yhteys) {
    $error="Can't connect to database.";
print $error;
return;
}

$ok=mysqli_select_db($yhteys, "trtkp20a3");

if (!$ok) {
    $error="Can't choose database.";
print $error;
return;
}


$sql="insert into parketti_posti(email) values(?)";
$stmt=mysqli_prepare($yhteys, $sql);
if (!$stmt){
 $error="Can't make an SQL -statement.";
print $error;
return;
}

$ok=mysqli_stmt_bind_param($stmt, 's', $email);
if (!$ok){
$error="Can't add information to the database";
print $error;
return;
}
$ok=mysqli_stmt_execute($stmt);
if (!ok){
$error ="Failed to save.";
print $error;
return;
}
print $error;
?>
<?php
function anyError($level, $message){
    print "ERROR: " .$message. "<br>";
}
?>