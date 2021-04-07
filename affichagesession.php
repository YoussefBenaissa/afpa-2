<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="css/styles.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />

    <title>Hello, world!</title>
</head>

<body>
<?php
    if (isset($_SESSION["nom"])) {
        echo "afficher le nom " . $_SESSION["nom"] . ".<br>";
        echo "afficher le prenom " . $_SESSION["prenom"] . ".<br>";
        echo "afficher l'adress' " . $_SESSION["adresse"] . ".";
    ?>
        <a href="deletesession.php">suppression</a>
    <?php
    } else {

        echo "pas de session";
    ?>
        <a href="session1.php">creation</a>
    <?php
    }
    ?>
    <script src="js/myscript.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>