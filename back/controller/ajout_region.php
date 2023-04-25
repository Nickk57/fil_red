<?php
require_once('model/ajout_region.php');

function ajout_region() {
    $success = '';

    if(isset($_POST['submit'])) {
        $success = ajoutRegion();
    }

    require('view/ajout_region.php');
}