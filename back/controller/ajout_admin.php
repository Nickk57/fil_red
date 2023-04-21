<?php
require_once('model/ajout_admin.php');
$success = '';

function ajout_admin() {

    if(isset($_POST['submit'])) {
        $success = ajoutAdmin();
    }
    require('view/ajout_admin.php');
}