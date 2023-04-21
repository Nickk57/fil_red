<?php
require_once('model/modific_weight.php');
$success = '';

function select_weight() {

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $selWeight = selectWeight($id);
    }
    require('view/modific_weight.php');
}