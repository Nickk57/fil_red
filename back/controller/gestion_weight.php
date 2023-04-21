<?php
require_once('model/gestion_weight.php');

function gestion_weight() {
    
    $gest_weight = gestionWeight();
    $success = '';

    require('view/gestion_weight.php');

}