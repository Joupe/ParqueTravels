 <?php

// Tarkistaa onko submit nappi painettu eli onko post metodia submit
if (isset($_POST['submit'])) {
   $nickanme = (isset($_POST['nickname'])); // undefined index
   $kaupunki = $_POST['kaupunki']; // undefined index
   $textarea = (isset($_POST['textarea']));
   $rating = (isset($_POST['rating'])); // undefined index

   // Deafaultisti on false
   $errorEmpty = false;
   
   // Tarkistetaan onko tyhjiä kenttiä formissa
   if (empty($nickanme)) { // ei toimi
       // class form-error on new.css filessä
        echo "<span class='form-error'>Fill in a nickname!</span>";
        $errorEmpty = true;
   }
   // if (empty($kaupunki)) {
   //   echo "<span class='form-error'>Choose a city!</span>";
   //   $errorEmpty = true;
   if (empty($textarea)) {
      echo "<span class='form-error'>Fill in the textarea!</span>";
      $errorEmpty = true;
   }
   if (empty($rating)) {
      echo "<span class='form-error'>Choose a rating!</span>";
      $errorEmpty = true;
   }
   else{ // Jos ei tule virheitä niin tulee onnistumis viesti
       // class form-success on new.css filessä
       echo "<span class='form-success'>Success to submit a rating!</span>";

   }
}
else{
    echo "There was an error!";
}

?>

<script>
    // Tarkistetaan data

    // Poistaa input-error vaikutuksen teksikentästä, otin arvostelu-kaupunki pois
    $("#arvostelu-nickname, arvostelu-textarea, arvostelu-rating").removeClass("input-error");

    // JavaSCript variable on yhtä suuri kuin PHP variable
    var errorEmpty = "<?php echo $errorEmpty; ?>";

    // Näytetään sivulle, jos on erroria
    if (errorEmpty == true) {
        // class input-error css on new.css
        // otin arvostelu-kaupunki pois
        $("#arvostelu-nickname, arvostelu-textarea, arvostelu-rating").addClass("input-error");
    }
    if (errorEmpty == false) { // otin arvostelu-kaupunki pois
        $("#arvostelu-nickname, arvostelu-textarea, arvostelu-rating").addClass("input-error").val("");
    }


</script>