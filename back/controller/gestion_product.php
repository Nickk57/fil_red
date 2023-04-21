<?php
require_once('model/gestion_product.php');
require_once('model/gestion_picture.php');
$success = '';

function gestion_product() {
    
    $gest_product = gestionProduct();

    require('view/gestion_product.php');
}