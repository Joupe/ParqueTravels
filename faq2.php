<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Frequently Asked Questions about our travels.">
  <meta name="author" content="Waltteri Grek, Joona Heinonen, Joel Kailanto,Erik Kihn">
  <title>Frequently Asked Questions</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/new.css">
  <link rel="stylesheet" type="text/css" href="css/finland.css">

</head>
<body>
  
    <!-- navbar -->
    <nav class="navbar navbar-expand-md">
      <div class="logo-image">
        <img src="images/woodenplane+pirate.png" style="width: 50px;" alt="logo">
        <a class="navbar-brand" href="https://joupe.github.io/Laminaattiparketti/index">
          ParqueTravels
        </a>
      </div>
      <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main-navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="https://joupe.github.io/Laminaattiparketti/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://joupe.github.io/Laminaattiparketti/reservation_form">Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://joupe.github.io/Laminaattiparketti/destinations">Destinations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://joupe.github.io/Laminaattiparketti/faq">FAQ</a>
          </li>
          <li class="nav-item">
    
            <a class="nav-link" href="#footer">Contact us</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- navbar ends -->

    <!-- Content starts -->
    <br>
    <h1><i><b>Questions and answers</b></i></h1>
    <br>
    <h3><b>Write your question to the form, and we will answer it as soon as possible!</b></h3>
    <br>
    <form action="lahetakysymys.php" method="post">
      <h3>Ask anything from ParqueTravels:</h3> <br>
      <input type="text" name="kysymys" value='' size="75"><br>
      <br>
      <input type="submit" name="ok" value="Send"><br>

      </form>
	<h3>You asked, we answered:</h3>
<br>
<?php
$yhteys=mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
if (!$yhteys) {
print "404";
}
$tietokanta=mysqli_select_db($yhteys, "trtkp20a3");

$tulos=mysqli_query($yhteys, "select * from parketti_kysjavas");

while ($rivi=mysqli_fetch_object($tulos)) {
	
	print "<center>Q: $rivi->kysmari<br> A: $rivi->vastaus<br><br></center>";
	
}

?> 
  <!-- Content ends -->

  <!-- Footer -->
  <div id="footer"></div>
  <div class="footer">
  <div class="container features">
    
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h2 class="feature-title">Address</h2>
          <p class="footpara">Laminaatintie 24</p>
          <p class="footpara">Hämynlinna, Finland</p>
          
        
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h2 class="feature-title">Email</h2>
          <p class="footpara">contact@parquetravels.ogr</p>
          
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4"> 
          <h2 class="feature-title">Social Media</h2>  
          <div style="text-align: center;">
          <a class="linku" href="https://www.facebook.com/" >FACEBOOK</a><br><br>
          <a class="linku" href="https://www.instagram.com/" >INSTAGRAM</a></div> <br>
        
        </div>
      </div> 
  </div>
  </div>


  <!-- End Footer -->

  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!--JavaScripot Library-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>

</body>
</html>
