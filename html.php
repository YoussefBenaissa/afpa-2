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
  <h1 class="container bg-primary text-center">Hello, world!</h1>
  <?php
  $tab = [
    "1" => ["james", "bond", "image1.png"],
    "2" => ["philippe", "Girard", "image2.png"],
    "3" => ["Tony", "Blair", "image3.png"],
    "4" => ["youssef", "Benaissa", "image4.png"],
    "5" => ["rayen", "hidri", "image5.png"]
  ];
  ?>
  <div class="container">
    <div class="row">
      <?php
      foreach ($tab as $cle => $personne) {
      ?>

        <div class="card " style="width: 18rem;">
          <img class="card-img-top" src="images/<?php echo $personne[2]  ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"> <?php echo $personne[0]  ?></h5>
            <p class="card-text"><?php echo $personne[1]  ?></p>

          </div>
        </div>
      <?php
      }

      ?>
    </div>
  </div>
  <?php
  $d = mktime(11, 14, 54, 8, 12, 2014);
  echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";
  echo "Created date is " . date("d-m-Y h:i:sa", $d) . "<br>";
  echo "Created date is " . date("d-m-Y H:i:s", $d) . "<br>";
  ?>
  <?php
  $date = strtotime("03/06/21");
  $dates = strtotime("+4 weeks", $date);
  while ($date < $dates) {
    echo "le week end du " . date("l d M", $date) . " et du " . date("l d M", strtotime("+1 days", $date)) . "<br>";

    $date = strtotime("+1 weeks", $date);
  }

  /*$debut = strtotime("first day of this month");
    $fin = strtotime("last sunday of this month");
    while ($debut <= $fin) {
      echo "dimanche" . date("d-m-Y", strtotime("sunday", $debut)) . "samedi" . date("d-m-Y", strtotime("saturday", $debut)) . "<br>";
      $debut = strtotime("+1week", $debut);
    } solution de taissir a revoir */


  /*$date_deb = strtotime(date("d-m-Y", mktime(0, 0, 0, date("m"), 01, date("Y"))));
  $date_fin = strtotime(date("d-m-Y", mktime(0, 0, 0, date("m") + 1, 01, date("Y"))));

  //test mail 2021
  // $date_deb = strtotime(date("d-m-Y", mktime(0, 0, 0, 05, 01, date("Y"))));
  // $date_fin = strtotime(date("d-m-Y", mktime(0, 0, 0, 06, 01, date("Y"))));

  //echo date("d-m-Y", $date_deb);

  date("l", $date_deb) === "Saturday" ? $samedi = $date_deb : $samedi = strtotime("next Saturday", $date_deb);
  date("l", $date_deb) === "Sunday" ? $dimanche = $date_deb : $dimanche = strtotime("next Sunday", $date_deb);

  while ($samedi < $date_fin && $dimanche < $date_fin) {
    echo date("d-m-Y", $samedi) . "<br>";
    echo date("d-m-Y", $dimanche) . "<br>";
    $samedi = strtotime("next Saturday", $samedi);
    $dimanche = strtotime("next Sunday", $dimanche);
  }

echo "<br>";
explication: supposons que je veux recupérer la date du 1er du mois en cours

la date du mois en cours = 01/03/2021

comment je peux créer ça ?

c via la fonction mktime(h,m,s, mois, jour, annee)

dans mon cas je fais

mktime(0,0,0, date("m"), 01, date("Y"))

pour les heures, minutes, secondes, je mets des 0
pour récupérer le mois en cours, j utilse la fonction date() avec le param "m"
puis pour le jour, je mets 01, pour le 1er du mois

et pour l'année, pareil que le mois, date("Y")

ce qui me donne ça

mktime(0, 0, 0, date("m"), 01, date("Y"))

==> au format timestamp

je veux le convertir en date avec formatage francophone

j utilise la fonction date avec le format souhaité

date("d-m-Y", mktime(0, 0, 0, date("m"), 01, date("Y")))

comme ça j'aurai la date de début du mois en cours

je fais pareil pour la date de fin (je la definis au debut du mois prochain)

ensuite j'essaye de deduire le 1er samedi

je teste tt d'abord si le 1er du mois est un samedi ou pas

si oui, smedi = date_deb

sinon je cherche le samedi le plus proche

et pareil pour dimanche

date("l", $date_deb) === "Saturday" ? $samedi = $date_deb : $samedi = strtotime("next Saturday", $date_deb);
  date("l", $date_deb) === "Sunday" ? $dimanche = $date_deb : $dimanche = strtotime("next Sunday", $date_deb);

ensuite je vais parcourir tous les weekends du mois, donc je pense à une boucle, while peut faire l'affaire

while ($samedi < $date_fin && $dimanche < $date_fin) {
    echo date("d-m-Y", $samedi) . "<br>";
    echo date("d-m-Y", $dimanche) . "<br>";
    $samedi = strtotime("next Saturday", $samedi);
    $dimanche = strtotime("next Sunday", $dimanche);
  }


la condition de while est tant que les dates des samedis et dimanches sont < au 1er du mois prochain, je fais ceci

-j'affiche le weekend en cours (samedi et dimanche)

-je les decale d'une semaine pour avoir les weekends prochains

rappel du code entier

<?php
  $date_deb = mktime(0, 0, 0, date("m"), 01, date("Y"));
  $date_fin = mktime(0, 0, 0, date("m") + 1, 01, date("Y"));

  //test mail 2021
  // $date_deb = strtotime(date("d-m-Y", mktime(0, 0, 0, 05, 01, date("Y"))));
  // $date_fin = strtotime(date("d-m-Y", mktime(0, 0, 0, 06, 01, date("Y"))));

  //echo date("d-m-Y", $date_deb);

  date("l", $date_deb) === "Saturday" ? $samedi = $date_deb : $samedi = strtotime("next Saturday", $date_deb);
  date("l", $date_deb) === "Sunday" ? $dimanche = $date_deb : $dimanche = strtotime("next Sunday", $date_deb);

  while ($samedi < $date_fin && $dimanche < $date_fin) {
    echo date("d-m-Y", $samedi) . "<br>";
    echo date("d-m-Y", $dimanche) . "<br>";
    $samedi = strtotime("next Saturday", $samedi);
    $dimanche = strtotime("next Sunday", $dimanche);
  }

echo "<br>";
  ?>
autres solution: 
function weekend(){
$debut = strtotime("first day of this month");
    $fin = strtotime("last Sunday of this month");
while ($debut <= $fin) {
  $samedi=strtotime("Saturday", $debut);
  $dimanche=strtotime("Sunday", $debut);
  echo date("M d", $samedi) . "\n".date("M d", $dimanche). "<br>" ;
  $debut =strtotime("+1 week", $debut);
}
}
weekend();
?>
----------------------------------
<?php
$deb=strtotime("first Saturday of this month");
$dim=strtotime("first Sunday of this month");
$fin=strtotime("last Sunday of this month", $deb);

while ($deb < $fin) {

  echo date("d M Y", $deb) . "<br>";
  echo date("d M Y", $dim) . "<br>";
  $deb = strtotime("+1 week", $deb);
  $dim = strtotime("+1 week", $dim);

}
?>
*/
  /* definir si une anné est bissextile ou non :*/
  ?>
  <div class="container lescards">
    <div class="row">
      <?php
      $jsonData =
        '[
    {"nom":"ballon","description":"un ballon","prix":25, "categ":"jouets"},
    {"nom" : "PC", "description" :"un PC", "prix" : 1000, "categ" :"informatique"},
    {"nom" : "tablette", "description" :"une tablette", "prix" : 120, "categ" :"téléphonie"},
    {"nom" : "aspirateur", "description" :"un aspirateur", "prix" : 200, "categ" :"électroménager"}
]';
      $tab2 = json_decode($jsonData, true);

      uasort($tab2, function ($item1, $item2) {
        return $item1["prix"] > $item2["prix"];
      });

      foreach ($tab2 as $produit) {
        echo $produit['nom'] . "<br>";
        echo $produit['description'] . "<br>";
        echo $produit['prix'] . "<br>";
        echo $produit['categ'] . "<br><br>";
      }

      /*vous remarquez bien 0 ==>, 1 =>  ... etc

du coup, on utilise la variante des tab indexés de foreach

foreach ($tab as $produit)

ensuite, à l'intérieur d ela foreach, je regarde ce uq ej ai comme donnée

donc je fais un var_dump de la var $produit

var_dump($produit);

ce qui donne ceci

array (size=4)
      'nom' => string 'ballon' (length=6)
      'description' => string 'un ballon' (length=9)
      'prix' => int 25
      'categ' => string 'jouets' (length=6)

==> je constate que $produit est tab associatif, et pour acceder à ses données, il faut que je passe par des cles

pour récupérer le nom : je fais $produit['nom']

et je les affiche comme suit :

echo $produit['nom']."<br>";
    echo $produit['description'] . "<br>";

etc
pour trier un tableau selon le prix il y a deux solution : la premiére:
$newTab = json_decode($jsonData, true);
        $newTab2= array_column($newTab, 'prix');
        array_multisort($newTab2, SORT_ASC, $newTab);

deuxieme solution : 
uasort($datay1, function($item1, $item2){
    return $item1["prix"]> $item2["prix"];
});        ...
revoir les fonction uasort , array_colum, array_multisort()
3eme solution:
function tri($elem1, $elem2)
{
    if ($elem1['prix'] == $elem2['prix']) return 0;
    return ($elem1['prix'] > $elem2['prix']) ? 1 : -1;
}
usort($tab, 'tri'); c'est la meme que la 2 */
      ?>
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name="name"><br>
        Prenom: <input type="text" name="prenom"><br>
        Adresse: <input type="text" name="adresse"><br>
        Age: <input type="number" name="age"><br>
        E-mail: <input type="email" name="email"><br>
        Ville: <input type="text" name="ville"><br>
        CP : <input type="number" name="cp"><br>
        <input type="submit" name="valider" value="valider">
      </form>

      <?php
      if (isset($_POST["valider"])) {
      ?>

        Name: <?php echo $_POST["name"]; ?><br>
        Prenom: <?php echo $_POST["prenom"]; ?><br>
        Adresse: <?php echo $_POST["adresse"]; ?><br>
        Age: <?php echo $_POST["age"]; ?><br>
        E-mail: <?php echo $_POST["email"]; ?><br>
        Ville: <?php echo $_POST["ville"]; ?><br>
        CP : <?php echo $_POST["cp"]; ?><br>
      <?php
      } else {
      ?>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          Name: <input type="text" name="name"><br>
          Prenom: <input type="text" name="prenom"><br>
          Adresse: <input type="text" name="adresse"><br>
          Age: <input type="number" name="age"><br>
          E-mail: <input type="email" name="email"><br>
          Ville: <input type="text" name="ville"><br>
          CP : <input type="number" name="cp"><br>
          <input type="submit" name="valider" value="valider">
        </form>
      <?php
      }
      ?>
      <?php
      ?>
      <div class="container lescards">
        <div class="row">

          <?php
          $jsonData3 =
            '[
    {"nom":"ballon","description":"un ballon","prix":25, "categ":"jouets"},
    {"nom" : "PC", "description" :"un PC", "prix" : 1000, "categ" :"informatique"},
    {"nom" : "tablette", "description" :"une tablette", "prix" : 120, "categ" :"téléphonie"},
    {"nom" : "aspirateur", "description" :"un aspirateur", "prix" : 200, "categ" :"électroménager"}
]';





          $tab3 = json_decode($jsonData3, true);
          $nouvellevaleur = "";
          foreach ($tab3 as $pdt3) {
            $nouvellevaleur = "images/" . $pdt3["nom"] . ".png";
            $pdt3['image'] = $nouvellevaleur;



          ?>
            <div class="col-md-3 col-6 col-sm-6 col-l-3 col-xl-3 cardboot divboot">
              <div class="card  cardboot">
                <img class="card-img-top" src="<?php echo $pdt3["image"] ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $pdt3["nom"] ?></h5>
                  <p class="card-text"><?php echo $pdt3["description"] ?></p>
                  <p class="card-text"><?php echo $pdt3["prix"] ?></p>
                  <p class="card-text"><?php echo $pdt3["categ"] ?></p>
                  <a href="#" class="btn btn-primary">Acheter</a>
                </div>
              </div>
            </div>
          <?php
          }
          var_dump($pdt3);
          ?>
        </div>
      </div>
  





      <script src="js/myscript.js">
      </script>
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/all.min.js"></script>
      <script>
      </script>
</body>


</html>