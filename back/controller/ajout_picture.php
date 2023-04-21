<?php
require_once('model/ajout_picture.php');


function ajout_picture() {

    $success = '';
    
    if(isset($_POST['submit'])) {
        $success = ajoutPicture();
        
    }
    
    require('view/ajout_picture.php');
    
}