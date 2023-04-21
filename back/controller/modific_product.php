<?php
require_once('model/modific_product.php');


function select_product() {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $selProduct = selectProduct($id);
        
    }

    require('view/modific_product.php');
}