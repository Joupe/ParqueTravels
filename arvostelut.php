<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Frequently Asked Questions about our travels.">
  <meta name="author" content="Waltteri Grek, Joona Heinonen, Joel Kailanto,Erik Kihn">
  <title>Arvostelut demo sivu, AJAX</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/new.css">
  <link rel="stylesheet" type="text/css" href="css/finland.css">
  
 <!--jQuery-->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
 integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    function sendData(form){
      // tehdään olio
        var arvostelu=new Object();
        // olion attribuutteja
        arvostelu.nickname=form.nickname.value;
        arvostelu.kaupunki=form.kaupunki.value;
        arvostelu.atextarea=form.atextarea.value;
        arvostelu.rating=form.rating.value;
        
        // Muodostetaan JSON-merkkijono
        var x=JSON.stringify(arvostelu);

        // Hoitaa request response loopin
        xmlhttp = new XMLHttpRequest();
        
        // Call a function when the state changes.
        xmlhttp.onreadystatechange = function() { 
          if (this.readyState == 4 && this.status == 200) {
            // Request valmista. Sitten processoidaan. Palauttaa php filen inputit message id:lle html:ssä. 
            document.getElementById("message").innerHTML = this.responseText;
          }
        };
        // POST muodossa lähetetään
        xmlhttp.open("POST", "arvostelut2.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("arvostelu=" + x); // arvostelu on se avain ja x on JSON-stringi, joka läheteään eteenpäin
	  }

  </script>
 
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

      <h2>Enter a review for a city</h2>
      <form id="arvosteluarvot">
          <div class="form-group">
            <label>Nickname:</label>
            <input name="nickname" id="nickname" type="text"  value="" class="form-control" />
          </div>
          <div class="form-group">
            <!-- Valita maa ja sitten alavalikkoon kaupunki? -->
            <select id="kaupunki" name="kaupunki">
              <option value="Forssa">Forssa
              <option value="Hervanta">Turku
              <option value="Korso">Korso
              <option value="Tukholma">Tukholma
              <option value="Gavle">Gävle
              <option value="Stockholm">Stockholm
              <option value="Bergen">Bergen
              <option value="Oslo">Oslo  
              <option value="Moscow">Moscow
              <option value="Siberia">Siberia
              <option value="St_Petersburg">St.Petersburg
              
            </select><br>
          </div>
          <div class="form-group">
              <label for="arvostelu">Write a review!</label>
              <div>
                <textarea id="atextarea" name="atextarea" value="" rows="5" cols="50" placeholder="Write the review here"></textarea>
              </div>
          </div>
          <div class="form-group">
            <!-- Radio button-->
            <label for="rating">Rating:</label>
            <div>
              <svg><use href="#vihree" ></use></svg>
                <label class="radio-inline"><input type="radio" id="rating" name="rating" value="3">Rating 3</label>
                <svg><use href="#keltainen" ></use></svg>
                <label class="radio-inline"><input type="radio" id="rating" name="rating" value="2">Rating 2</label>
                <svg><use href="#punainen" ></use></svg>
                <label class="radio-inline"><input type="radio" id="rating" name="rating" value="1">Rating 1</label>
            </div>
        </div>
        <input type='button' name='ok' value='OK' onclick='sendData(this.form);' class="btn btn-primary" style="background-color: #2d2e3b;">
        
      </form>

      <p id="message"></p>

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


$tulos=mysqli_query($yhteys, "select * from parketti_arvostelut");

while ($rivi=mysqli_fetch_object($tulos)) {
	print "<center>Nickname: $rivi->nimimerkki<br> Kohdekaupunki: $rivi->kohdekaupunki<br> Arvostelu: $rivi->arvostelu <br> Arvosana: $rivi->arvosana<br><br></center>";
	
}


mysqli_close($yhteys);


?>
    
    
    <!-- Vihree hymiö -->

    <svg>
      <symbol id="vihree" width="100" height="100">
        <!-- cx ja cy ovat ympyrän keskipisteet. r on säde(radius). Stroke on ääriviiva. -->
        <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="green" />
        <!-- Rx ja ry ovat leveys ja pituus ellipsille. -->
        <ellipse cx="40" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <ellipse cx="60" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <!-- M on startti piste, Q on referenssi pisteet. Quadratic curve -->
        <path class="suu" d="M 30,60 Q 47,85 70,60" style="stroke:black;stroke-width:3; fill:transparent;" />
        Sorry, your browser does not support inline SVG.
      </symbol>
     </svg> 

     <!-- Keltainen hymiö -->
    <svg >
      <symbol id="keltainen" width="100" height="100">
        <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="yellow" />
        <ellipse cx="40" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <ellipse cx="60" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <line class="suu" x1="30" y1="65" x2="70" y2="65" style="stroke:rgb(0, 0, 0);stroke-width:3" />
        Sorry, your browser does not support inline SVG.
      </symbol>
     </svg> 

     <!-- Punainen hymiö -->
     <svg>
       <symbol id="punainen" width="100" height="100">
        <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" />
        <ellipse cx="40" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <ellipse cx="60" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <!-- M on startti piste, Q on referenssi pisteet. Quadratic curve -->
        <path class="suu" d="M 30,70 Q 47,45 70,70" style="stroke:black;stroke-width:3; fill:transparent;" />
        Sorry, your browser does not support inline SVG.
      </symbol>
     </svg> 

<!-- Content ends-->
     
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
          <p class="footpara">contact@parquetravels.org</p>
          
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

  
  <!--JavaScript Library-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  

</body>
</html>
