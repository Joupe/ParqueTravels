<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Frequently Asked Questions about our travels.">
  <meta name="author" content="Waltteri Grek, Joona Heinonen, Joel Kailanto,Erik Kihn">
  <title>Arvostelut sivu, AJAX</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/new.css">
  <link rel="stylesheet" type="text/css" href="css/finland.css">
  
  <!--jQuery-->
  
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
        xmlhttp.send("arvostelu=" + x); // arvostelu on se avain ja x on JSON-stringi, joka lähetetään eteenpäin
	  }

  </script>
<!-- CSS style tablelle -->
<style>
    table, th, td {
	
        border: 1px solid black;
        border-collapse: collapse;
	justify-content: center;
	align-items: center;
	margin-left: auto;
  	margin-right: auto;
    }
	table{ 
	width: 1500px;
	}
    td {
        padding: 30px;
        background-color: #afbbff;
	color: black;
	word-wrap: break-word;
    }
    th {
	font-size: 150%;
        padding: 30px;
        text-align: left;
        background-color: #2d2e3b;
	color: white;
    }

    </style>
 
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

      <br><br>
	<h2 style="font-size:300%"><b>Please, review your customer experience!</b></h2>
	<br>
      <form id="arvosteluarvot">
          <div class="form-group">
            <label>Nickname:</label><br><br>
            <input name="nickname" id="nickname" type="text" maxlength="20" value="" size="50">
          </div><br>
          <div class="form-group"><br>
            <!-- Valita maa ja sitten alavalikkoon kaupunki? -->
            <select id="kaupunki" name="kaupunki">
              <option value="Forssa">Forssa
              <option value="Hervanta">Hervanta
              <option value="Korso">Korso
              <option value="Tukholma">Tukholma
              <option value="Gavle">Gävle
              <option value="Stockholm">Stockholm
              <option value="Bergen">Bergen
              <option value="Oslo">Oslo  
              <option value="Moscow">Moscow
              <option value="Siberia">Siberia
              <option value="St_Petersburg">St.Petersburg
              
            </select><br><br>
          </div>
          <div class="form-group">
              <label for="arvostelu">Write a review!</label>
              <div>
                <textarea id="atextarea" name="atextarea" value="" rows="5" cols="50" maxlength="200" placeholder="Write the review here, max. 200 characters."></textarea>
              </div>
          </div>
          <div class="form-group">
          <!-- Radio button-->
            <label for="rating">Rating:</label>
          <div class="tadaa">
            <label class="radio-inline">
		<svg><use href="#vihree" ></use></svg>
		<input type="radio" id="rating" name="rating" value="3"></label>

                <label class="radio-inline">
		<svg><use href="#keltainen" ></use></svg>
		<input type="radio" id="rating" name="rating" value="2"></label>

                <label class="radio-inline">
		<svg><use href="#punainen" ></use></svg>
		<input type="radio" id="rating" name="rating" value="1"></label>
            </div>
        </div>
        <input type='button' name='ok' value='OK' onclick='sendData(this.form);' class="btn btn-primary" style="background-color: #2d2e3b;">
        
      </form>

      <p id="message"></p>
	<br><br><br><br>

    <h2 style="font-size:400%"><i><b>Customer reviews</b></i></h2><br>

    <table>
        <tr>
            <th>Nickname</th>
            <th>Destination</th>
            <th>Review</th>
            <th>Grade</th>
        </tr>
    <?php
    // Koodin tarkoitus on ottaa tietokannasta arvostelut ja nÃ¤yttÃ¤Ã¤ websivulle mitÃ¤ siellÃ¤ on

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

    $sql ="select * from parketti_arvostelut order by kohdekaupunki";
    $tulos=mysqli_query($yhteys, $sql);

    while ($rivi=mysqli_fetch_assoc($tulos)) {
      echo "<tr><td>". $rivi["nimimerkki"]. "</td><td>". $rivi["kohdekaupunki"]."</td><td>". 
        $rivi["arvostelu"]. "</td><td>". $rivi["arvosana"]. "</td></tr>";
        }
        echo "</table>"; 


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
          <p class="footpara">HÃ¤mynlinna, Finland</p>




        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h2 class="feature-title">Email</h2>
          <p class="footpara">contact@parquetravels.ogr</p>
          <h2 class="feature-title">Join our mailing list!</h2>
          <div style="text-align: center;">
            <form>
              <input id='email' type='text' name='email' placeholder='Your email here.' value=''>
            </form>
            <br>
            <button name='submit' id='submit'>Submit</button>

            <p class="footpara" id="tulos"></p>

            <script>
              $(document).ready(function () {
                $("#submit").click(function () {
                  $.post("postilista.php",
                    {
                      email: $("#email").val()
                    },
                    function (data, status) {
                      $("#tulos").html(data);
                    });
                });
              });
            </script>
            <script>
              $(document).ready(function () {
                $("#customRadio1").click(function () {
                  $.post("hinnat.php",
                    {
                      country: $("#country").val(),
                      sweden: $("#swedencity").val(),
                      norway: $("#norwaycity").val(),
                      russia: $("#russiacity").val(),
                      finland: $("#finlandcity").val(),
                      holidaytype: $(this).val()
                    },
                    function (data, status) {
                      $("#hinta").html(data);
                    });
                });
              });
            </script>
            <script>
              $(document).ready(function () {
                $("#customRadio2").click(function () {
                  $.post("hinnat.php",
                    {
                      country: $("#country").val(),
                      sweden: $("#swedencity").val(),
                      norway: $("#norwaycity").val(),
                      russia: $("#russiacity").val(),
                      finland: $("#finlandcity").val(),
                      holidaytype: $(this).val()
                    },
                    function (data, status) {
                      $("#hinta").html(data);
                    });
                });
              });
            </script>
            <script>
              function resetcities() {
                finlanddefault.selected = true;
                norwaydefault.selected = true;
                swedendefault.selected = true;
                russiadefault.selected = true;
              }
            </script>

          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h2 class="feature-title">Social Media</h2>
          <div style="text-align: center;">
            <a class="linku" href="https://www.facebook.com/">FACEBOOK</a><br><br>
            <a class="linku" href="https://www.instagram.com/">INSTAGRAM</a>
          </div> <br>


        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  
  <!--JavaScript Library-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
