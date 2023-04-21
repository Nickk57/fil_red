<?php
require_once('model/ajout_product.php');

function ajout_product() {
    $success = '';
    $subCategory = selectSubCategory();
    
    if(isset($_POST['submit'])) {

        $success = ajoutPicture_product();
    }

    require('view/ajout_product.php');
}