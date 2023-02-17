<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("location: connexion_admin.php");
}
require_once('model/model.php');
dbConnect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link reel="stylesheet" style="text/css" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        
        // $post = getPost();
        // require_once('templates/homepage.php');
        require_once('include/bar_nav.php');
    ?>
</body>
</html>