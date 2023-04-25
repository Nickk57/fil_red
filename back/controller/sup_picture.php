<?php
include('model/sup_picture.php');

function sup_picture() {
    if(isset($_GET['id'])) {
        $msg = supPicture();
    }

    require('view/sup_picture.php');
}