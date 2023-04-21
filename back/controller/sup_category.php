<?php
    include('model/sup_category.php');
    
    function sup_category() {
        if(isset($_GET['id'])) {
           supCategory(); 
        }

        require('view/sup_category.php');
    }