<?php
include "classes/voiture3.php";
$moto1 = new moto("2", "vert", "ducati", "a63", "150cc");
echo $moto1->message2() . "<br>";
echo $moto1->affichageParent() . "<br>";

$test = new utilisetrait;
$test->affichetrait();
echo "<br>";
$test->afficheClass();

require_once 'classes/connexion.php';

$idcon = connexion();
var_dump($idcon);
$requete = "SELECT * FROM clients ORDER BY nom";
$result = $idcon->query($requete);
$count = $result->rowCount();
var_dump($count);
$colcount = $result->columnCount();
echo "<br>";
var_dump($colcount);

/* requette preparé syntaxe:
I) la methode des variables liées:
<?php
    /* Exécute une requête préparée en liant des variables PHP */
/*$calories = 150;
    $couleur = 'rouge';
    $sth = $dbh->prepare('SELECT nom, couleur, calories
        FROM fruit
        WHERE calories < :calories AND couleur = :couleur');
    $sth->bindParam(':calories', $calories, PDO::PARAM_INT);
    $sth->bindParam(':couleur', $couleur, PDO::PARAM_STR, 12);
    $sth->execute();
    ?>
ensuite, on associe à chaque param sa valeur

$requete->bindParam(':calories', $calories, PDO::PARAM_INT);

on associe au param : :calories la valeur de la var $calories

PDO::PARAM_INT : ca signifie que le param :calories sera de type entier

on fait pareil pour la couleur

$requete->bindParam(':couleur', $couleur, PDO::PARAM_STR, 12);

PDO::PARAM_STR : ce param est de type chaine de caract

et de longueur 12
en gros, on fait comme suit :

1- on prepare la requete

2- on associe des valeurs aux param

3- on execute la requete
------------------------------------------------------------------
II) la methode avec un tableau de valeurs:

<?php
    $calories = 150;
    $couleur = 'rouge';
    $sth = $dbh->prepare('SELECT nom, couleur, calories
        FROM fruit
        WHERE calories < :calories AND couleur = :couleur');
    $sth->execute(array(':calories' => $calories, ':couleur' => $couleur));
?>
cette syntaxe utilise la methode des tab associatifs + c'est la methode qui nous est reconmandé
---------------------------------------------------------------------
III) methodes tableau de valeur et marqueurs:
<?php
/* Exécute une requête préparée en passant un tableau de valeurs 
$calories = 150;
$colour = 'rouge';
$sth = $dbh->prepare('SELECT nom, couleur, calories
	FROM fruit
	WHERE calories < ? AND couleur = ?');
$sth->execute(array($calories, $couleur));
?>
1er ? va avoir la 1ere valeur du tab : $calories
2eme ? va avoir la 2eem val du tab : $couleur
*/



$age = 18;

$sth = $idcon->prepare('SELECT *
	FROM clients
	WHERE age >? order by age');
$sth->execute(array($age));
$nbrligne = $sth->rowCount();
var_dump($nbrligne);
// afficher les donnees de la requettes ://
if ($nbrligne > 0) {
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { // le pdo::fetch_assoc nous permet de mettre tout les donnes dans un tableau associatif //
        echo "nom: " . $row["nom"] . "<br>" . $row["age"] . "<br>";
        var_dump($row);
    }
} else {
    echo "0 results";
}
/*explication du cas du if cad si le nb de lignes est > 0
on va faire une boucle while qui va parcourir toutes les lignes
a chaque fois on va récupérer une ligne via la methode fetch()
a chaque fois la mathode fetch() va recupérer une ligne et va la mettre dans la var $row
-------------------------------------------------
2eme methode de parcours de données:

if ($count > 0) {
  $clients= $req->fetchAll();
  foreach ($clients as $client) {
    echo $client['nom'] . '<br />';
 }
} else {
  echo "0 results";
}
NB : si vous faites une fetch() en dehors d'une boucle et que vous ayez plusieurs lignes issues de la bdd, elle n'affiche que la 1ere
si vous avez plusieurs ligne retournées, il faut utilser fetch dans une boucle pour les recupérer ligne par ligne (de la 1ere jusqua la dernière)
ou bien utiliser fetchAll et l'affecter à une var (qui ser de type tableau) pour les voir toutes, puis parcourir le tableau
*/

$nord = 'nord';
$sth2 = $idcon->prepare('SELECT * FROM departement where departement_nom=?');
$sth2->execute(array($nord));
$nbrligne2 = $sth2->rowCount();
var_dump($nbrligne2);
if ($nbrligne2 > 0) {
    while ($row2 = $sth2->fetch(PDO::FETCH_ASSOC)) {
        echo "departement id :" . $row2["departement_id"] . " departement code :" . $row2["departement_code"] . " departement nom :" . $row2["departement_nom"] . " departement soundex:" . $row2["departement_nom_soundex"];
    }
}
/* correction : pas obliger de faire une boucle on peut utiliser la fonction fletch pour récuperer toutes les données :
$dep = "Nord";
$requete2 = $idcon->prepare("SELECT * FROM departement WHERE departement_nom =:dep");
$requete2->execute([":dep" => $dep]);
$count2 = $requete2->rowCount();
if ($count2 > 0){
      $clients= $requete2->fetch();

    echo $clients['departement_id'] . " " . $clients['departement_code'] . '<br />';
 
} else {
  echo "0 results";
}
*/
/*function listeDep($nomdepartement)
{$idcon = connexion();// oblige de mettre la connexion sinon la variable $idcon nest pas reconnue a l'interieur
    $sth3 = $idcon->prepare('SELECT * FROM departement where departement_nom=?');
    $sth3->execute(array($nomdepartement));
    $nbrligne3 = $sth3->rowCount();
    var_dump($nbrligne3);
    if ($nbrligne3 > 0) {
        while ($row3 = $sth3->fetch(PDO::FETCH_ASSOC)) {
            echo "departement id :" . $row3["departement_id"] . " departement code :" . $row3["departement_code"] . " departement nom :" . $row3["departement_nom"] . " departement soundex:" . $row3["departement_nom_soundex"];
        }
    }else{ echo "0 resultat";}
    
}
$depart='';
listeDep($depart);
*/
function listeDep($departement)
{
    $idcon = connexion();
    $depp = "%$departement%";
    $requete3 = $idcon->prepare("SELECT * FROM departement WHERE departement_nom LIKE :departement");

    $requete3->execute([":departement" => $depp]);

    $count3 = $requete3->rowCount();

    if ($count3 > 0) {

        $departements = $requete3->fetchAll();

        foreach ($departements as $departement) {
            echo "<br>". $departement['departement_id'] . " " . $departement['departement_code'] . " " . $departement['departement_nom'] . '<br />';
        }
    } else {
        echo "0 results";
    }
}
listeDep("Alpes");
/*listeDep("Alpes");
cad les chaines qui
1- commencent par d'autres caract, suivis du mot alpes
2-ya pas d'autres caract, donc la chaine commence par alpes
3-la chaine contient alpes et suivies par d'autres caract
4-elle commence par d'autres caract, puis la chaine alpes puis autres caract
%alpes% ==>            0 ou n caract       +          alpes          +          0 ou n caract
*/ 
