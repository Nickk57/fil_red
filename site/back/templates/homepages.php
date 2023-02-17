<?php
session_start();
require_once('model/model.php');
function homepage() {
    $post = getPosts();
    require('templates/homepages.php');
}
