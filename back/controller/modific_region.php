<?php
require_once('model/modific_region.php');

function select_region() {
    $success = '';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $selKindgrind = selectRegion($id);
    }

    require('view/modific_region.php');
}