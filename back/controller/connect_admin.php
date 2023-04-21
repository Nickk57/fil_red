<?php

require_once('model/connect_admin.php');
$success = '';
// setcookie('email', '1234');

function connect_admin() {
    
    if(isset($_POST['submit'])) {
        $success = adminConnect();
    }
}
require('view/connect_admin.php');