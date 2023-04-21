<?php

include('model/sup_kindgrind.php');

function sup_kindgrind() {
    if(isset($_GET['id'])) {
        supKindgrind();
    }

    require('view/sup_kindgrind.php');
}