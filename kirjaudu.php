<!DOCTYPE html>
<html>
<head>
<title>Vaatii kirjautumisen</title>
<link rel="stylesheet" type="text/css" href="css/finland.css">
<link rel="stylesheet" type="text/css" href="css/new.css">
</head>
<body>
<h1>ParqueTravels Admin page</h1>
<?php
print "<h2>Kirjaudu</h2>"
?>

<form action="tarkistakirjautuminen.php" method="post">
    <input type="text" name="tunnus" value="" placeholder="username"><br>
    <input type="password" name="salasana" value="" placeholder="password"><br><br>
    <input type="submit" name="ok" value="Kirjaudu"><br>
</form>
</body>
</html>




