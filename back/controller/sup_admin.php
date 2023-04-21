<?php

    include_once('model/sup_admin.php');

    function sup_admin() {
        if(isset($_GET['id'])) {
            supAdmin();
        }
        require('view/sup_admin.php');
    }