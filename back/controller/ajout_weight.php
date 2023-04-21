<?php
require_once('model/ajout_weight.php');

function ajout_weight() {

    $success = '';
    
    if(isset($_POST['submit'])) {
        $success = ajoutWeight();
    }

    require('view/ajout_weight.php');
    
}