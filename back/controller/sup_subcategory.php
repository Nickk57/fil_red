<?php
include('model/sup_subcategory.php');

function sup_subcategory() {
    if(isset($_GET['id'])) {
        supSubCategory();
    }

    require('view/sup_category.php');
}