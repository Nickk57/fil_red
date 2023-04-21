<?php
require_once('model/modific_subcategory.php');
$success = '';


function select_subcategory() {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $subCategory = selectSubCategory($id);
    }

    require('view/modific_subcategory.php');
}

function modific_subcategory() {
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];
        $success = modificSubCategory();
    }

}