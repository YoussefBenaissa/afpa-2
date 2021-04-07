<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="css/styles.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />

    <title>html2</title>
  </head>
  <body>
  <?php
  include "classes/voiture2.php";
  $bmw2->tabbs();
  echo Voiture2::$nbObjet;
  



 

  ?>
  
   

    <script src="js/myscript.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
  </body>
</html>