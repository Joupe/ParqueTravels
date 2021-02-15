 <?php
// Syy käyttää PHP on, että ei voi ohittaa error handlereita ja validoidessa formeja koodissa


// Tarkistaa onko submit nappi painettu eli onko post metodia submit
if (isset($_POST['submit'])) {
   $nickanme = $_POST['nickname'];
   $kaupunki = $_POST['kaupunki'];
   $textarea = $_POST['textarea'];
   $rating = $_POST['rating'];

   // Deafaultisti on false
   $errorEmpty = false;
   
   // Tarkistetaan onko tyhjiä kenttiä formissa
   if (empty($nickanme)) {
       // class form-error on new.css filessä
        echo "<span class='form-error'>Fill in nickname!</span>";
        $errorEmpty = true;
   }
   if (empty($kaupunki)) {
    echo "<span class='form-error'>Choose a city!</span>";
    $errorEmpty = true;
   }
   if (empty($textarea)) {
    echo "<span class='form-error'>Fill in the textarea!</span>";
    $errorEmpty = true;
   }
   if (empty($rating)) {
    echo "<span class='form-error'>Choose a rating!</span>";
    $errorEmpty = true;
   }
   else{
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

    // Poistaa input-error vaikutuksen teksikentästä
    $("#arvostelu-nickname, arvostelu-kaupunki, arvostelu-textarea, arvostelu-rating").removeClass("input-error");

    // JavaSCript variable on yhtä suuri kuin PHP variable
    var errorEmpty = "<?php echo $errorEmpty; ?>";

    // Näytetään sivulle, jos on erroria
    if (errorEmpty == true) {
        // class input-error css on new.css
        $("#arvostelu-nickname, arvostelu-kaupunki, arvostelu-textarea, arvostelu-rating").addClass("input-error");
    }
    if (errorEmpty == false) {
        $("#arvostelu-nickname, arvostelu-kaupunki, arvostelu-textarea, arvostelu-rating").addClass("input-error").val("");
    }


</script>