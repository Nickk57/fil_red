<?php

require_once('model/sub_category.php');

function ajoutSubCategory(array $input) {
    $name = null;

    if(isset($input['name'])) {
        $name = $input['name'];
    }
    else {
        throw new Exception("Le Fiches n'est pas bon !");
    }
    $success = ajoutSsCategorie($name);
    if (!$success) {
        throw new Exception("Impossible d'ajoute une image !");
    }
    else {
        header('Location: index.php?page=4');
    }
}