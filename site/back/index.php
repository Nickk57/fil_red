<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("location: templates/connexion_admin.php");
}
require_once('controllers/ajout_photos.php');
require_once('model/model.php');
require_once('templates/layout.php');

dbConnect();
?>
<body>
    <?php
        
        // $post = getPost();
        // require_once('templates/homepage.php');
        require_once('templates/bar_nav.php');
    ?>
    <?php
        if(isset($_GET['page']) && $_GET['page'] !=NULL) {
            $page = strval($_GET['page']);

            if($page == 1){
                include_once('templates/insert_category.php');
            }
            elseif($page == 2){
                include_once("templates/gestion_category.php");
            }
            elseif($page == 3){
                include_once("templates/sup_category.php");
            }
            elseif($page == 4){
                include_once("templates/ajout_subcategory.php");
            }
            elseif($page == 5){
                include_once("templates/gestion_subcategory.php");
            }
            elseif($page == 6){
                include_once("");
            }
            elseif($page == 7){
                include_once("templates/ajoutProduct.php");
            }
            elseif($page == 8){
                include_once("");
            }
            elseif($page == 9){
                include_once("");
            }
            elseif($page == 10){
                include_once("templates/ajout_photos.php");
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