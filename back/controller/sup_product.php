<?php
include('model/sup_product.php');

function sup_product() {
    if(isset($_GET['id'])) {
        supProduct();
    }

    require('view/sup_product.php');
}