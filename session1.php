<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
$_SESSION["nom"]= "youssef" ;
$_SESSION["prenom"]= "benaissa" ;
$_SESSION["adresse"]= "86 rue kleber" ;

?>
<p>Session créée</p>
    <a href="affichagesession.php">Affichage</a>
</body>
</html>