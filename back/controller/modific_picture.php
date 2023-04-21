<?php
require_once('model/modific_picture.php');
$success = '';

function modific_picture() {
    if(isset($_POST['submit'])) {
        $success = modificPicture();
    }

    require('view/modific_picture.php');
}