<?php
require_once('model/modific_subcategory.php');
$success = '';


function select_subcategory() {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $subCategory = selectSubCategory($id);

        if(!isset($_POST['submit'])) {
            $success = modificSubCategory($id);
        }
    }

    require('view/modific_subcategory.php');
}
