<?php

include('model/sup_weight.php');

function sup_weight() {
    if(isset($_GET['id'])) {
        supWeight();
    }

    require('view/sup_weight.php');
}