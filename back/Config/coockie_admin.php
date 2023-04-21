<?php
$cookie_name = "admin";
$cookie_value = "true";

$cookie_expiration = time() + 60;

$cookie_path = "/";

$cookie_secure = true;

$cookie_http_only = true;

setcookie($cookie_name, $cookie_value, $cookie_expiration, $cookie_path, $cookie_secure, $cookie_http_only);