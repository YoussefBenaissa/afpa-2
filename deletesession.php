<?php
session_start();
?>
<!DOCTYPE html>
<html>

<body>

    <?php

    session_start();

    session_unset();
    session_destroy();
    header('Location: affichagesession.php');
    exit();
    /*header('Location: session2.php');     ==> permet de faire la redirection
    header('Location: nom_du_fichier');     : syntaxe de redirection*/ 
    ?>
</body>


</html>