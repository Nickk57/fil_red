<?php

function ajoutSubCategory() {
    $nom = htmlspecialchars($_POST['name']);

    $query = "INSERT INTO sub_category (name) VALUES (:name)";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $nom, PDO::PARAM_STR);
    $reponse = $req->execute();
    
    if ($reponse > 0) {
        $success = 'la sous-categorie à etait ajouter. ';
        return $success;
    }
    
}