<?php class Voiture2
{
    private $nbrroue;
    private $couleur;
    private  $marque;
    private $modele;
    public static $nbObjet=0;





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
      function tabbs (){?>
         <table class="table">
        <thead>
        <tr>
        <th scope="col">numero objet</th>
        <th scope="col">nombre de roue</th>
        <th scope="col">couleur</th>
        <th scope="col">marque</th>
        <th scope="col">modele</th>
      </tr>
        </thead>
        <tbody>
        <tr>
        <th scope="row"><?php Voiture2::$nbObjet ?></th>
        <td><?php echo $this->couleur ?></td>
        <td><?php echo $this->nbrroue ?></td>
        <td><?php echo $this->marque ?></td>
        <td><?php echo $this->modele ?></td>
    </tr>

        </tbody>
      </table>
      <?php
    }
    static function nombreVoiture()
    {
        echo "<h2>" . self::$nbObjet . "</h2>";
    }
    
    
}
;
$bmw2 = new Voiture2("4", "rouge", "bmw", "m5",);
