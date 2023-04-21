<?php

function ajoutKindgrind() {
    $name = htmlspecialchars($_POST['name']);

    $query = "INSERT INTO kind_grind (name) VALUES (:name)";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $reponse = $req->execute();

    if ($reponse > 0) {
        $success = 'une mouture à étais ajouter';
        return $success;
    }
}