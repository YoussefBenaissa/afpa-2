<?php
require_once "connexion.php";
class ModelClient
{
    public static function getClients()
    {
        $idcon = connexion();
        $req = $idcon->prepare("select * from clients");
        $req->execute();
        return $req->fetchAll();
    }
}