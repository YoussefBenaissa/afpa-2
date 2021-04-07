<?php

class voiture
{
    public $nbRoue;
    public $couleur;
    public $marque;
    public $modele;
    function __construct($nbRoue, $couleur, $marque, $modele)
    {
        $this->nbrroue = $nbRoue;
        $this->couleur = $couleur;
        $this->marque = $marque;
        $this->modele = $modele;
    }
    function Message()
    {
        echo "je suis la classe Vehicule";
    }
    function affichage()
    {
        echo "je suis la classe parente";
    }
}

class moto extends voiture
{
    private $volume;


    function message2()
    {
        echo "je suis la classe Moto";
    }
    function affichageParent()
    {
        parent::Message();
        echo " et ";
        parent::affichage();
    }
}

trait affichage
{
    public function affichetrait()
    {
        echo " je suis un  trait ";
    }
}

class utilisetrait
{
    use affichage;
    function afficheClass(){
        echo "affiche la classe";
    }

}
