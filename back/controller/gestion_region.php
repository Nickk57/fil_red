<?php
require_once('model/gestion_region.php');
require_once('model/gestion_picture.php');
$success = '';

function gestion_region() {

    $gest_kindgrind = gestionRegion();
    $gest_picture = gestionPicture();

    require('view/gestion_region.php');
}