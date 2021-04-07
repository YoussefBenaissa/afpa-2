<?php

class Voiture
{
    public $nbrroue;
    public $couleur;
    public $marque;
    public $modele;
    const ROULE = "la voiture roule bien";

    function roulebg()
    {
        echo self::ROULE;
    }

    function affichage()
    {
        echo "nous somme dans la classe voiture" . get_class($this);
    }
    function __construct($nbrroue, $couleur, $marque, $modele)
    {
        $this->nbrroue = $nbrroue;
        $this->couleur = $couleur;
        $this->marque = $marque;
        $this->modele = $modele;
    }

    function get_voiture()
    {
        return $this->nbrroue;
        $this->modele;
        $this->couleur;
        $this->marque;
    }
    function setModele($modele)
    {
        $this->modele = $modele;
    }
}

$bmw = new Voiture("4", "rouge", "bmw", "m5");
$bmw->setModele("m4"); // ici on change la valeur de la variable modele grace a la methode set_modele

echo $bmw->nbrroue;
echo "<br>";
echo $bmw->couleur;
echo "<br>";
echo $bmw->modele;
echo "<br>";
echo $bmw->marque;
var_dump($bmw instanceof Voiture); // on verifie que notre variable $bmw appartient a notre classe
echo Voiture::ROULE;
/*Les constantes ne peuvent pas être modifiées une fois qu'elles ont été déclarées.
Une constante de classe est déclarée à l'intérieur d'une classe avec le const mot - clé.
Les constantes de classe sont sensibles à la casse. Cependant, il est recommandé de nommer les constantes dans toutes les lettres majuscules. (pas une obligation, mais une convention de nommage)
quand tu vas instancier la classe, ca va passer automatiquement par le construct (pas besoin de passer par le setter sauf si tu veux changer les valeur)
le constructeur vous permet d'initialiser les propriétés d'un objet lors de la création de l'objet (et non pas la creation elle meme)
la creation se fait avec le mot clé new (c ca qui crée l'objet et non pas le constructeur)
a chaque création d'objet, on fait appel au constructeur, il peut avoir des param ou pas
pour chaque classe, on doit créer un constructeur, et s'il ne necessite pas de traitement, on peut le laisser vide


Donc pour la classe voiture on initialise les attribue suivant via la fonction construct() ce qui nous donne (dans la classe voiture) :
function construct($nbrroue,$couleur,$marque,$modele) {
    $this->nbrroue = $nbrroue;
    $this->couleur = $couleur;
    $this->marque = $marque;
    $this->modele = $modele;
}
Dans le fichier test.php on va inclure notre fichier variable et  instancie la classe Voiture:
<?php include 'Voiture.php';


$bmw=new Voiture ("4","rouge","bmw","m5");
echo $bmw -> nbrroue;
echo "<br>";
echo $bmw -> couleur;
echo "<br>";
echo $bmw -> modele;
echo "<br>";
echo $bmw -> marque;
var_dump($bmw instanceof Voiture);  // true
?>
  

les modificateurs d'acces :en pratique, toutes les données de l'objet doivent etre privées ==> ensuite il faut penser à des fonction PUBLIQUES qui permettent de manipuler l'objet (les getters et les setters)
*/
class Voiture2
{
    private $nbrroue;
    private $couleur;
    private  $marque;
    private $modele;
    public static $nbObjet = 0;





    function __construct($nbrroue, $couleur, $marque, $modele)
    {
        $this->nbrroue = $nbrroue;
        $this->couleur = $couleur;
        $this->marque = $marque;
        $this->modele = $modele;
        self::$nbObjet++;
    }

    function getAttribue()
    {
        echo "<br>" . $this->marque . "<br>" . $this->couleur . "<br>" . $this->nbrroue . "<br>" . $this->modele;
    }
    function getCouleur()
    {
        return $this->couleur;
    }
    function getmarque()
    {
        return $this->marque;
    }
    function getnbrroue()
    {
        return $this->nbrroue;
    }
    function getmodele()
    {
        return $this->modele;
    }
    function setModele($modele)
    {
        $this->modele = $modele;
        return $this;
    }
    function setnbrroue($nbrroue)
    {
        $this->nbrroue = $nbrroue;
        return $this;
    }
    function setcouleur($couleur)
    {
        $this->couleur = $couleur;
        return $this;
    }
    function setmarque($marque)
    {
        $this->marque = $marque;
        return $this;
    }
    static function tabbs()
    {
        echo "";
    }
}
$bmw2 = new Voiture2("4", "rouge", "bmw", "m5",);
echo $bmw2->getAttribue();
$bmw2->setmodele('m3');
echo $bmw2->getAttribue();
echo "<br>" . $bmw2->getnbrroue(); // les setter permettent de definir de nouvelle variable et les getter de récuperer les valeur et de les affecter a des variables 
echo "<br> cacommence ici " . $bmw2->getmarque();
echo "<br>" . $bmw2->getmodele();
$bmw2->setmarque("merco");
$bmw2->setCouleur("vert");
$bmw2->setmodele("a63amg");
echo "<br>" . $bmw2->getnbrroue();
$bmw2->setnbrroue("5");
echo "<br>" . $bmw2->getnbrroue();
echo "<br>" . $bmw2->getCouleur();
echo "<br>" . $bmw2->getmarque();
echo "<br>" . $bmw2->getmodele();
// chainage possible $bmw -> setCouleur("vert") -> setModele("a63amg") -> setMarque("merco"); il est préférable d'utiliser la méthode de chainag qui est plus courte
$merco = new Voiture2("4", "vert", "merco", "a45");
echo "<br>" . Voiture2::$nbObjet; // on veut afficher le nb d'objets crées, ne pas oublier l'incrementation dans le construct: self::$nbObjet++;
/* heritage: Une classe héritée est définie à l'aide du extends mot - clé.
exemple: <?php
class Fruit {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit {
  public function message() {
    echo "Am I a fruit or a berry? ";
  }
}
$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();
?>
important : on ne peut hériter que d'une seule classe à la fois
une classe  C herite d'une classe B ==> B herite d'une classe A
C ==> B ==> A
C herite de A d'une façon en passant par B
en gros une classe peut avoir plusieurs filles, mais un seul parent A LA FOIS
dans une classe fille, on peut appeler une methode de la classe mere avec le mot cle parent
par exemple:  parent::intro(); on utilise la methode du parent pour l'element fille
--------------------------------------------------------------------------------------
Les classes abstraite : Une classe abstraite ne permet pas l’instanciation d’objets mais sert uniquement de classe de base pour la création de classes dérivées.
Une classe abstraite peut contenir des méthodes déclarées public ou protected, qu’elles soient elles-mêmes abstraites ou non.
Une méthode abstraite ne doit contenir que sa signature, sans aucune implémentation.
Chaque classe dérivée est chargée de créer sa propre implémentation de la méthode. Une classe contenant au moins une méthode abstraite doit obligatoirement être déclarée abstraite, sinon elle permettrait de créer des objets qui auraient une méthode non fonctionnelle.
revoir le cours : https://www.w3schools.com/php/php_oop_classes_abstract.asp
*/