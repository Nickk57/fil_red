<?php
require_once('model/gestion_kindgrind.php');
require_once('model/gestion_picture.php');
$success = '';

function gestion_kindgrind() {

    $gest_kindgrind = gestionKindgrind();
    $gest_picture = gestionPicture();

    require('view/gestion_kindgrind.php');
}