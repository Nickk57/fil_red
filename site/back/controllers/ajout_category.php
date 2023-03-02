<?php

require_once('model/category');

function ajoutCategory(array $input, string $post) {
    $name = null;
    
    if(empty($input['name'])) {
        $name = $input['name'];
    }
    else {
        throw new Exception('le nomn\'est pas bon !');
    }
    $success = ajoutCategory($name, $post);
    if(!$success) {
        throw new Exception("impossible d'ajoute une category !");
    }
    else {
        header('location: index.php?action=post&id=' . $post);
    }
}