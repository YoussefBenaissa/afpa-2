<?php
include_once "../model/ModelClient.php";
class ViewClient {
    public static function listeClients() {
        $clients = ModelClient::getClients();
       foreach($clients as $client)
       {
           echo $client['nom']."<br>";
       }
    }
}