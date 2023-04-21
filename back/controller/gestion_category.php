<?php
require_once('model/gestion_category.php');
$success = '';

function gestion_category() {

    $gest_category = gestionCategory();

    require('view/gestion_category.php');
}
