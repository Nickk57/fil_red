<?php
require_once('model/ajout_category.php');
$success = '';

function ajout_category() {
    
    if(isset($_POST['submit'])) {
        $success = ajoutCategory();
    }

    require('view/ajout_category.php');
}