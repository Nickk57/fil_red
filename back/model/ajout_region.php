<?php

function ajoutRegion() {
    $name = htmlspecialchars($_POST['name']);

    $query = "INSERT INTO region (name) VALUES (:name)";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $reponse = $req->execute();

    if ($reponse > 0) {
        $success = "l'ajout d'une region est fait";
        return $success;
    }
}