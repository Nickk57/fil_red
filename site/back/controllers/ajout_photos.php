<?php

require_once('model/Photo.php');
function ajoutPhotos() {
    $name = null;
    $chemin = null;
    
    if(!empty($input['name']) && !empty($input['chemin'])) {
        $name = $input['name'];
        $chemin = $input['chemin'];
    }
    else {
        throw new Exception('Le fiches n\'est pas bon !');
    }
    $success = ajoutPhotos($name, $chemin);
    if (!$success) {
        throw new Exception("Impossible d'ajoute une image !");
    }
    else {
        header('Location: index.php?page=10');
    }
}