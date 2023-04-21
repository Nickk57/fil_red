<?php
require_once('model/modific_kindgrind.php');
include_once('model/gestion_picture.php');

function select_kindgrind() {
    $success = '';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $selKindgrind = selectKindgrind($id);
        $gest_picture = gestionPicture();
    }

    require('view/modific_kindgrind.php');
}