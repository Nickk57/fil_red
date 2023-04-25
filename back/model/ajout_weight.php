<?php

function ajoutWeight() {
    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $success = "il faut un nom valide !";
        return $success;

    } else {
        $name = strip_tags($_POST['name']);
    
        $query = "INSERT INTO weight (name) VALUES (:name)";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $reponse = $req->execute();

        if ($reponse > 0) {
            $success = 'le poid à étais ajouter.';
            return $success;
        }
    }
}