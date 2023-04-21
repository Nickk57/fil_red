<?php

function ajoutCategory() {
    $nom = htmlspecialchars($_POST['name']);

    $query = "INSERT INTO category (name) VALUES (:name)";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $nom, PDO::PARAM_STR);
    $reponse = $req->execute();
    if ($reponse > 0) {
        $success = 'une category est ajouter';
        return $success;
    }
    
}