<?php
require_once('model/ajout_subcategory.php');
$success = '';

function ajout_subcategory() {

    if(isset($_POST['submit'])) {
        $success = ajoutSubCategory();
    }

    require('view/ajout_subcategory.php');
}