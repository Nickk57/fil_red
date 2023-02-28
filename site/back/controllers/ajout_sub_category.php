<?php

require_once('model/sub_category.php');
require_once('model/ajoutPhSubCategory');

function ajoutSubCategory() {
    $name = null;
    $namePicture = null;
    $chemin = null;

    if(!empty($input['name']) && !empty($input['namePicture'])
    && !empty($_POST['chemin'])) {
        $name = $input['name'];
        $namePicture = $input['namePicture'];
        $chemin = $input['chemin'];
    }
    else {
        throw new Exception("Le Fiches n'est pas bon !");
    }
    $success += ajoutSsCategorie($name);
    $success += ajoutPhSubCategory($namePicture, $chemin);
    if (!$success) {
        throw new Exception("Impossible d'ajoute une image !");
    }
    else {
        header('Location: index.php?page=5');
    }
}