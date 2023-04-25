<?php

include('model/sup_region.php');

function sup_region() {
    if(isset($_GET['id'])) {
        supRegion();
    }

    require('view/sup_region.php');
}