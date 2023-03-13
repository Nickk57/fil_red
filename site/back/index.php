<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("location: view/connexion_admin.php");
}
require_once('view/bar_nav.php');
require_once('layout.php');
require_once('model/model.php');
// require_once('controllers/ajout_category.php');
// require_once('templates/layout.php');

// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

dbConnect();
?>
<body>
    <?php
        if(isset($_GET['page']) && $_GET['page'] !=NULL) {
            $page = strval($_GET['page']);

            if($page == 1){
                include_once('controllers/insert_category.php');
            }
            elseif($page == 2){
                include_once("view/gestion_category.php");
            }
            elseif($page == 3){
                include_once("view/sup_category.php");
            }
            elseif($page == 4){
                include_once("view/ajout_subcategory.php");
            }
            elseif($page == 5){
                include_once("view/gestion_subcategory.php");
            }
            elseif($page == 6){
                include_once("");
            }
            elseif($page == 7){
                include_once("view/ajoutProduct.php");
            }
            elseif($page == 8){
                include_once("");
            }
            elseif($page == 9){
                include_once("");
            }
            elseif($page == 10){
                include_once("view/ajout_photos.php");
            }
            elseif($page == 11){
                include_once("");
            }
            elseif($page == 12){
                include_once("");
            }
            elseif($page == 13){
                include_once("");
            }
            elseif($page == 14){
                include_once("ajout_admin/ajout_admin.php");
            }
            else {
                include_once("index.php");
            }
        }
        else {
            include_once("index.php");
        }
    ?>