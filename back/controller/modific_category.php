<?php
require_once('model/modific_category.php');
$success = '';

function select_category() {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $selCategory = selectCategory($id);
    }
    require('view/modific_category.php');
}