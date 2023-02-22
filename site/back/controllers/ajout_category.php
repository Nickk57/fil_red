<?php

require_once('model/category');
function ajoutCategorie() {
    $name = null;
    
    if(isset($input['name'])) {
        $name = $input['name'];
    }
    else {
        throw new Exception('le nomn\'est pas bon !');
    }
    $success = ajoutCategorie($name);
    if(!$success) {
        throw new Exception("impossible d'ajoute une category !");
    }
    else {
        header('location: index.php?page=1')
    }
}