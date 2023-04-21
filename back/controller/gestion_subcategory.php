<?php
require_once('model/gestion_subcategory.php');
$success = '';

function gestion_subcategory() {

    $gest_subcategory = gestionSubCategory();
    
    require('view/gestion_subcategory.php');
}