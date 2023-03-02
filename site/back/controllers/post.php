<?php
require_once('model/model.php');
require_once('model/ajout_category');

function post(string $identifier) {
    $post = getPost($identifier);
    $category = getCategory($identifier);
    require('templates/post.php');
}