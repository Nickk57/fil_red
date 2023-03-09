<?php

function ajoutCategory(array $input) {
    $name = null;
    
    if(empty($input['name'])) {
        $name = $input['name'];
    }
    else {
        throw new Exception("le nom n'est pas bon !");
    }
    $success = ajoutCategory($name, $post);
    if(!$success) {
        throw new Exception("impossible d'ajoute une categorie !");
    }
    else {
        header('Location: index.php?page=2');
    }
}