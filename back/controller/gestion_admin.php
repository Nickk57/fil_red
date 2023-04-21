<?php
require_once('model/gestion_admin.php');
$success = '';

function gestion_admin() {
    
    $gest_admin = gestionAdmin();

    require('view/gestion_admin.php');
}