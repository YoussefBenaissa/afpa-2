<?php
$tab = ['bonjour', 'salut', 'ciao'];

function tria($tab)
{
    sort($tab);
    echo end($tab);
};
tria($tab);

$chaine = "bonjour salut ciao";

function ligne($chaine)
{
    echo str_replace(" ", "<br>", $chaine);
};

ligne($chaine);
function afficheTab($tab)
{
    print_r($tab);
};

afficheTab($tab);
/*$taab=["linux","c","java","python"];

    function affi($taab){
        foreach ($taab as $value) {
            echo "  $value ";
        };
    };
    affi($taab); corection de l'exercice d'apres le formateur il faut pas utiliser la fonction print_r()*/

function racine($a)
{

    if ($a > 0) {
        return sqrt($a);
    } else {
        return -1;
    }
}
echo racine(5);


$max = [10, 20, 15, 15, 10];
function valMaxTab($tab)
{
    max($tab);
    if (max($tab) > 100) {
        return 1;
    } else {
        return -1;
    };
}
echo valMaxTab($max);

function randomNum($nb)
{
    $somme = 0;
    $var = 0;
    for ($i = 1; $i <= $nb; $i++) {
        $var = (rand(1, 10));
        echo $var . "<br>";
        $somme += $var;
    }
    return $somme;
}
echo randomNum(6);

$capitales = [
    ["France" => ["Paris", 215646, 14646848498]],
    ["Belgique" => ["Bruxelles", 1545748, 1877987]],
    ["Allemagne" => ["Berlin", 47948, 48798489787]],
    ["Espagne" => ["Madrid", 54564456, 4748989]],
];
function affichTab($tab)
{
    foreach ($tab as $pays => $val) {
        foreach ($tab[$pays] as $donnees => $donnee) {
            echo "<br> Pays : " . key($tab[$pays]) . "<br>";
            echo "Capitale : " . $donnee[0] . "<br>";
            echo "nb habitants : " . $donnee[1] . "<br>";
            echo "PIB : " . $donnee[2] . "<br><br>";
        }
    }
};
affichTab($capitales);
/* la premiére boucle each vas parcourir tout les tableau attention on a un tableau multidimensionnel par exemple: case 0 = ["France"=>["Paris",215646,14646848498]]
la deuxiéme boucle each va elle en effet parcourir le deuxiemme tableau qui lui contient les infos et on fini par les afficher. pour comprendre le fonctionement de la boucle each:
 https://www.w3schools.com/php/php_looping_foreach.asp
*/

$mdp = "ABab&&cd4";

function verifieMdp($mdp)
{
    if (strlen($mdp) < 8) {
        return -1;
    }

    $maj = ["A", "B", "C"];
    $min = ["a", "b", "c"];
    $chiffres = [0, 1, 2, 3, 4];
    $spec = ["&", "!", "?", "$"];

    $valid_maj = false;
    $valid_min = false;
    $valid_chiffres = false;
    $valid_spec = false;

    for ($i = 0; $i < strlen($mdp); $i++) {

        if (in_array($mdp[$i], $maj)) {
            $valid_maj = true;
        }
        if (in_array($mdp[$i], $min)) {
            $valid_min = true;
        }
        if (in_array($mdp[$i], $chiffres)) {
            $valid_chiffres = true;
        }
        if (in_array($mdp[$i], $spec)) {
            $valid_spec = true;
        }
        if ($valid_maj && $valid_min && $valid_chiffres && $valid_spec === true) {
            return 1;
        }
    }
    return -1;
}
echo verifieMdp($mdp);
/*revoir la correction et l'apprendre 
2eme solution: function verifmdp($x)
{
    strlen($x) < 8 ? $t = -1 : $t = 1;
    strtolower($x) != $x ? $t1 = 1 : $t1 = -1;
    strtoupper($x) != $x ? $t2 = 1 : $t2 = -1;
    (strpos($x, "?") + strpos($x, "&") + strpos($x, "$") + strpos($x, "!")) + 1 == 1 ? $t3 = -1 : $t3 = 1;
    for ($i = 0; $i < strlen($x); $i++) {

        if (is_numeric($x[$i])) {
            $t4 = 1;
            break;
        } else {
            $t4 = -1;
        }
    };
    $t += $t1 + $t2 + $t3 + $t4;
    return $t == 5 ? 1 : -1;
};*/



/*<?php
  $tab = [
    "1" => ["james", "bond", "@james_bon"],
    "2" => ["philippe", "Girard", "@phil"],
    "3" => ["Tony", "Blair", "@tony"],
    "4" => ["youssef", "Ben issa", "@youss59dz"],
    "5" => ["rayen", "hidri", "@rayoo_tn"]
  ];
  ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($tab as $cle => $personne) {
      ?>
        <tr>
          <th scope="row"><?php echo $cle  ?></th>
          <td><?php echo $personne[0]  ?></td>
          <td><?php echo $personne[1]  ?></td>
          <td><?php echo $personne[2]  ?></td>
        </tr>
      <?php
      }

      ?>

    </tbody>
  </table>
  generer un tableau en php , s'inspirer de la synthaxe */

function divide($dividend, $divisor)
{
    if ($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    echo divide(5, 0);
} catch (Exception $e) {
    echo " <br> " . "division par 0 est impossible";
}
/*le bloc try est le bloc qui sera surveillé ( dans le sens qu il genere une exception ou pas)
  ==> l'execution de la fonction devide() va generer une Exception ( throw new Exception("Division by zero");)
  la ligne:throw new Exception("Division by zero");dans la fonction divide();
  une fois que l'exception est declenchée au moment de lexecution de la fonction devide, c'est le bloc catch qui prend la releve et traite l'exception
  en gros le mecanisme se fait comme suit :
  try (appel de la fonction qui risque de generer une exception)
  ==> execution de la fonction (dont dans sa definition il y a une levee d'exception avec le mot clé throw)
  ==> bloc catch pour traiter l'exception
  et enfin, un bloc finally (optionnel) qui va s'excuter dans tous les cas
  try (surveillance) ==> fonction (levee d'exception) ==> catch (traitement)

 --------------------------------------------------
 JSON EN PHP :

  $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

  $arr = json_decode($jsonobj, true);

  foreach($arr as $key => $value) {
  echo $key . " => " . $value . "<br>";
}
json_encode($tab)  ==> transforme un tab PHP vers un objet JSON
json_decode($tab) ==> transforme un objet JSON en Objet PHP
json_decode($tab, true) ==> transforme un objet JSON en tab associatif PHP
je recommande d utiliser json_decode($tab, true)

  */
echo "<br>";
$tab = ["nom" => "produit phare", "description" => "Le produite phare de notre site", "prix" => 1000, "categ" => "PC"];
echo json_encode($tab);
$jsonData =
    '[
    {"nom":"ballon","description":"un ballon","prix":25, "categ":"jouets"},
    {"nom" : "PC", "description" :"un PC", "prix" : 1000, "categ" :"informatique"},
    {"nom" : "tablette", "description" :"une tablette", "prix" : 120, "categ" :"téléphonie"},
    {"nom" : "aspirateur", "description" :"un aspirateur", "prix" : 200, "categ" :"électroménager"}
]';
$tab2 = json_decode($jsonData, true);
var_dump($tab2);
$num1 = "0616203795";
$num2 = "123456789";
function numtel($num)
{
    $regex = "#^0[1-9][0-9]{8}$#";
    if (preg_match($regex, $num) == 1) {
        echo "le num est bon <br> ";
    } else return  "  no good <br>";
}

echo numtel($num1);
echo numtel($num2);
$nom1 = "salut";
$nom2 = "yous59";
function nompersone($nom)
{
    $regex2 = "#^[a-z]{2,}$#i";
    if (preg_match($regex2, $nom) == 1) {
        echo "le format est bon <br>";
    } else return " le format est incorrect <br>";
}
echo nompersone($nom1);
echo nompersone($nom2);
$nom3 = "5salut";
function nom2($name)
{
    return preg_match("#^[a-z][\w-]*$#i", $name) == 1 ? "ok" : "noo";
}
echo nom2($nom3);
/*REGEX: https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/916990-les-expressions-regulieres-partie-1-2 le cours est parfait
    une expression reguliere est une chaine de caractères donc elle contient des "" 
     elle doit definir des delimiteurs (qu on peut spécifier nous memes):
      exemple : "/  /" ==> ici les  /   /, entres "//", on met notre modele
      exp : "/w3schools/" : ici le modele est w3schools cad les chaines qui contiennent la chaine w3schools(modifié)
      apres on peut mette i ou pas pour dire si notre modele est sensible à la casse ou pas (si on le met pas, par defaut sensible à la casse)
      "/w3schools/i"  ==> le modele est insensible à la casse
      "W3schools" ne repond pas au modele "/w3schools/" car elle commence par W (maj) mais elle correspond au modele "/w3schools/i" car ce dernier est insensible à la casse
      ^ : debut de chaine
^ : debut de chaine
$ : fin de chaine
[] : groupe de valeurs
[a-z] : lettres min
[A-Z] : lettres maj
[a-zA-Z] lettres min et maj
[0-9] : chiifre de 0 à 9
[a-zA-Z0-9] lettres min et maj et chiffres
\d : [0-9]
\D : [^0-9]
\w : [a-zA-Z0-9]
\W (w maj) : [^a-zA-Z0-9]
\t : Tabulation
\n : Saut de ligne
\r : Retour chariot
\s : Espace blanc (correspond à \t\n\r  )
\S : N'est PAS un espace blanc ( \t\n\r  )
. : n'importe quel caractère
[^] : ne contient pas
[^0-9] : ne contient pas de chiffres
? : se repete 0 ou 1 fois
+ : 1 ou n fois
* : 0 ou n fois
() : tout le mot ou expression entre les ()
| : ou
{n} :  ca se répète exactement n fois
{n,m} : ca se répète entre n et m fois
{n,} : ca se répète au moins n fois

4
29 mars 2021

Racourci:
\d

Indique un chiffre.
Ça revient exactement à taper [0-9]

\D

Indique ce qui n'est PAS un chiffre.
Ça revient à taper [^0-9]

\w

Indique un caractère alphanumérique ou un tiret de soulignement.
Cela correspond à [a-zA-Z0-9_]

\W

Indique ce qui n'est PAS un mot.
Si vous avez suivi, ça revient à taper [^a-zA-Z0-9_]

\t

Indique une tabulation

\n

Indique une nouvelle ligne

\r

Indique un retour chariot

\s

Indique un espace blanc

\S

Indique ce qui n'est PAS un espace blanc ( \t \n \r  )

.

Indique n'importe quel caractère.
Il autorise donc tout !



pour tester les regex : https://regex101.com/;
*/


/*correction exercices regex: 
1- valider un mot de passe avec les conditions suivantes :
doit commencer par une maj, suivie par min, ensuite un ensemble de lettres et chiffres et il finit par un caractere special (&$%!?)
regex='#^[A-Z][a-z][a-zA-Z0-9]{5,}[&$%!?]$#'
2- valider une adresse mail:
regex="/^[\w.-]{2,}@[a-z0-9\-]{2,}[.][a-z]{2,}$/"
3- valider une adresse postale:
regex= "/^[\w\s\n\r-.éè]$/"

4- valider un code postal en France (5 chiffres):code_normal | outre mer | corse:
    regex= ^(  (0[1-9])  |   ([1-8][0-9])  |   (9[0-8])    |   (2A)    |   (2B)    )  [0-9]   {3}$
(  (0[1-9])  |   ([1-8][0-9])  |   (9[0-8])    |   (2A)    |   (2B)    ) ==> signifie qu 'on a 5 possibilités

5- remplacer les num de téléphones (succession de chiffres avec ou sans espace, tiret de 6  (-), tiret de 8 (_) ) par la chaine "non autorisé" (utiliser l'une des fonctions regex)(modifié)
chacun dans une fonction à part:
preg_replace(/^0[1-9]([-. ]?\d{2}){4}$/, " non autorisé ",$text)

*/

$str = 'message 01-23-45-67-89 p suite 01/23/25/69/87  lettres 01.23.25.69.87 encore lettres 01 23 25 69 87 ou 0123256987';

function remplace($text)
{

    return preg_replace("/0[1-9]([-.\/\s]?\d{2}){4}/", "non autorisé", $text);
}
echo  remplace($str);
/* explication de la regex : (     (un séparateur qui peut etre - ou . ou / ou espace qui peut exister ou pas suivi par un chiffre)  x 2   )   x4 
NB : lorsque vous faites des remplacements multiples avec preg_replace, pensez à enlever les ^ et $ (à moins que vous en ayez besoin) pour que le remplacement soit fait pour toutes les occurences
*/
$regex6 = '/^(?=.* [a-z])(?=.* [A-Z])(?=.*[0-9])(?=.*[!@#$%^&*-]).{8,20}$/'; /*?= : verifier qu'il doit existe dans la chaine on le met dans des parenthéses: 
(?=.* [a-z]) : cela signifie qu'on cherche une correspondance avec l'expression  .*[a-z] dans le sens de gauche à droite (sens par defaut)
autrement dit il cherche l'expression  : des caractères  qui existent 0 ou plusieurs fois puis un caractere minuscule
.* : n'importe quel caractère qui peut exister 0 ou n plusieurs fois
si on écrit [a-z] tout court, il va chercher une chaine qui commence forcément par [a-z] par contre si on met .* ca signifie que ca peut etre précédé par des caractères
?= va chercher l'existance de l' expression  .* [a-z]
ensuite il va faire la meme chose pour les maj, les chiffres et les caract spéciaux
et toute cette expression doit se répéter entre 8 et 20 fois
{8,20}
?= : verifier d'il existe dans le sens ==> 
on cherche l'existance de l'expression dans le sens de gauche à dte
(?=motif)    Vrai si le motif est vérifié (lookahead : suivi par motif sens  gauche a droite ==> : )
(?!motif)    Vrai si le motif échoue (negative lookahead : non suivi par motif sens ==>)
(?<=motif)    Vrai si le motif est vérifié (lookbehind : précédé par motif sens <== )
(?<!motif)    Vrai si le motif échoue (negative lookbehind : non précédé par motif sens <== )
? avec sybole de look : lookaround signifie suivi par (il doit exister) =/=  des cas [-][-] qui signifie des caract tolérés
[a-zA-Z0-9&$!?]{8,20} cest regex est bonne mais elle acceptera que des chiffre comme 888899988 et nous il nous faut plusieur chose pas que des chiffres
lien du cours : https://murviel-info-beziers.com/regex-assertions-lookaround-lookahead-lookbehind/

^(?<!re)bonjour$ : tout ce qui est bonjour n'est pas précédé par re

bonjour : valide
rebonjour : non valid
rebonjour n'est pas valide car elle contient le mot re qu'on cherche à ce qu'il n'apparaisse pas avant bonjour
----------------------------------------------
Les classes:
synthaxe d'une classe : 
class Fruit {
  // Properties
  public $name;
  public $color;
  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
pour accéder aux proprietes d'une classe à l'interieur de cette derniere, on utilise le mot clé this
exemple : public $name;
pour accéder à cette propriete, on ecrit
$this->name
et pour changer sa valeur, on fait :
$this->name = $val;
Instanciation de classe c'est à dire création d'un objet de classe(modifié)
$apple = new Fruit();
$banana = new Fruit();
chaucn des objets $apple et $banana est une instance de la classe Fruit
et ils ont les memes attributs et methodes de la classe Fruit
Appel de fonction sur un objet (ou de meethode) :
$apple->set_name('Apple');
$apple->set_color('Red');
Le mot-clé $ this fait référence à l'objet courant et n'est disponible que dans les méthodes(a l'interieur de la classe).
pour tester une variable on utilise:
$apple = new Fruit();
var_dump($apple instanceof Fruit);
-----------------------------------------
Les propriettes statiques:
PHP  introduit la notion de propriété et de méthode statique, qui permet d’accéder à ces éléments sans qu’il soit besoin de créer une instance de la classe.
exemple :
<?php
class pi {
  public static $value = 3.14159;
}
// Get static property
echo pi::$value;
?>
on definit une propriété ou méthode statique, il faut le précéder par le mot static
Comme les méthodes statiques sont utilisables sans la création d’objet, vous ne devez pas utiliser la pseudo-variable $this pour faire référence à une propriété de la classe dans le corps de la méthode.
parce que static, ca signifie une var ou une methode de classe, elle n'est pas propre à un objet à lui seul
l'acces à une var static se fait comme suit :
self::$propriété si la méthode est celle de la même classe, ou encore :
nomclasse::$propriété si la méthode est celle d’une autre classe.
(il faut pas oublier le caract $)

Si vous créez un objet instance de la classe, la propriété déclarée static n’est pas accessible à l’objet en écrivant le code $objet–>propriété. Par contre, les méthodes statiques sont accessibles par l’objet avec la syntaxe habituelle $objet–>méthode().
Si vous modifiez la valeur d’une propriété déclarée statique à partir d’un objet, cette modification n’est pas prise en compte par les méthodes qui utilisent cette propriété. Il y a donc un danger de confusion difficile à localiser puisque aucune erreur n’est signalée.
Pour pallier cet inconvénient, il faudrait ajouter à la classe une méthode spéciale qui modifierait la propriété bourse de la manière suivante :
public function setStaticVar($val)
{
    self::$staticVar=$val;
}

les methodes statiques:
les méthodes statiques peuvent être appelées directement - sans créer d'abord une instance de la classe.

Les méthodes statiques sont déclarées avec lestaticmot - clé:

exemple

<?php
class ClassName {
  public static function staticMethod() {
    echo "Hello World!";
  }
}
?>
pour appeler une methode statique  à l'intérieur de la meme classe, on utilise self::nom_methode();
[10:38]
exemple :
[10:38]
<?php
class greeting {
  public static function welcome() {
    echo "Hello World!";
  }

  public function __construct() {
    self::welcome();
  }
}

new greeting();
?>

les methodes statiques doivente etre publiques
Les méthodes statiques peuvent également être appelées de l'extérieur de la classe ou à partir de méthodes d'autres classes

appel de l'extérieur

<?php
class greeting {
  public static function welcome() {
    echo "Hello World!";
  }
}

// Call static method
greeting::welcome();
?>


*/
