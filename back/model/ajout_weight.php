<?php

function ajoutWeight() {
    $weight = strip_tags($_POST['name']);

    $query = "INSERT INTO product_weight (weight) VALUES (:weight)";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':weight', $weight, PDO::PARAM_STR);
    $reponse = $req->execute();

    if ($reponse > 0) {
        $success = 'un poid à étais ajouter';
        return $success;
    }
}