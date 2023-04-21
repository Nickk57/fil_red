<?php
require_once('model/ajout_kindgrind.php');
$success = '';

function ajout_kindgrind() {

    if(isset($_POST['submit'])) {
        $success = ajoutKindgrind();
    }

    require('view/ajout_kindgrind.php');
}