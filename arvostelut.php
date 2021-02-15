<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Frequently Asked Questions about our travels.">
  <meta name="author" content="Waltteri Grek, Joona Heinonen, Joel Kailanto,Erik Kihn">
  <title>Arvostelut demo sivu</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/new.css">
  <link rel="stylesheet" type="text/css" href="css/finland.css">
  
  <!-- scripti JQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Katsoo tietyn formin submittaamista, pitää olla ehkä uniikki form nimi
      $("form").submit(function(event){
        // disable default actioni formin sisällä
          event.defaultPrevented();
          // Kerätä kaikki data inputeista
          var nickname = $("#$arvostelu-nickname").val();
          var kaupunki = $("#$arvostelu-kaupunki").val();
          var textarea = $("#$arvostelu-textarea").val();
          // Pitäiskö tässä olla rating 1,2,3?
          var rating = $("#$arvostelu-rating").val();
          var submit = $("#$arvostelu-submit").val();
          // On class form-message, load(tiedostoon mihin ladata, )
          $(".form-message").load("arvostelut2.php", {
            // Eka value on post name ja seuraava on arvo inputeille
            // AJAX, loadaa PHP dokumentin ilman, että painaa refresh nappi sivulla
              nickname: nickname,
              kaupunki: kaupunki,
              textarea: textarea,
              rating: rating,
              submit: submit
          } );
      });
    });
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

      <h2>Enter a review for Forssa, Finland</h2>
      <form action="arvotelut.php" method="POST">
          <div class="form-group">
            <label for="nikki">Nickname:</label>
            <input id="arvostelu-nickname" type="text" class="form-control" />
          </div>
          <div class="form-group">
            <!-- Valita maa ja sitten alavalikkoon kaupunki -->
            <select id="arvostelu-kaupunki" name="city">
              <option value="Forssa">Forssa</option>
              <option value="Turku">Turku</option>
            </select>
          </div>
          <div class="form-group">
              <label for="arvostelu">Write a review!</label>
              <div>
                <textarea id="arvostelu-textarea" name="textarea" rows="5" cols="50" placeholder="Write the review here"></textarea>
              </div>
          </div>
          <div class="form-group">
            <label for="rating">Rating:</label>
            <div>
                <label id="rating3" for="rate1" class="radio-inline"><input type="radio" name="rating" >Rating 3</label>
                <label id="rating2" for="rate2" class="radio-inline"><input type="radio" name="rating" >Rating 2</label>
                <label id="rating1" for="rate3" class="radio-inline"><input type="radio" name="rating" >Rating 1</label>
            </div>
        </div>

        <button id="arvostelu-submit" type="submit" name="submit" class="btn btn-primary" style="background-color: #2d2e3b;">Submit</button>
        <p class="form-message"></p>
      </form>



    <h1>Testi SVG:llä emojit</h1>
    
    <!-- Vihree hymiö -->
    <svg width="100" height="100">
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
     </svg> 

     <!-- Keltainen hymiö -->
    <svg width="100" height="100">
        <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="yellow" />
        <ellipse cx="40" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <ellipse cx="60" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <line class="suu" x1="30" y1="65" x2="70" y2="65" style="stroke:rgb(0, 0, 0);stroke-width:3" />
        Sorry, your browser does not support inline SVG.
     </svg> 

     <!-- Punainen hymiö -->
     <svg width="100" height="100">
        <circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" />
        <ellipse cx="40" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <ellipse cx="60" cy="40" rx="5" ry="8"
        style="fill:black;" />
        <!-- M on startti piste, Q on referenssi pisteet. Quadratic curve -->
        <path class="suu" d="M 30,70 Q 47,45 70,70" style="stroke:black;stroke-width:3; fill:transparent;" />
        Sorry, your browser does not support inline SVG.
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

  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!--JavaScripot Library-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>

</body>
</html>
