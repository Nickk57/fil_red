<?php
session_start();


require_once('view/bar_nav.php');
require_once('model/model.php');


if(!isset($_SESSION["email"])) {
    require_once('controller/connect_admin.php');
    connect_admin();
    include('Config/coockie_admin.php');
} else {
        if(isset($_GET['page']) && $_GET['page'] !=NULL) {
            $page = strval($_GET['page']);

            if($page == 1){
                include_once('controller/ajout_category.php');
                ajout_category();
            }
            elseif($page == 2){
                include_once("controller/gestion_category.php");
                gestion_category();
            }
            elseif($page == 3){
                include_once("controller/sup_category.php");
                sup_category();
            }
            elseif($page == 4){
                include_once("controller/ajout_subcategory.php");
                ajout_subcategory();
            }
            elseif($page == 5){
                include_once("controller/gestion_subcategory.php");
                gestion_subcategory();
            }
            elseif($page == 6){
                include_once("controller/sup_subcategory.php");
                sup_subcategory();
            }
            elseif($page == 7){
                include_once("controller/ajout_Product.php");
                ajout_product();
            }
            elseif($page == 8){
                include_once("controller/gestion_product.php");
                gestion_product();
            }
            elseif($page == 9){
                include_once("controller/sup_product.php");
                sup_product();
            }
            elseif($page == 10){
                include_once("controller/ajout_picture.php");
                ajout_picture();
            }
            elseif($page == 11){
                include_once("controller/gestion_picture.php");
                gestion_picture();
            }
            elseif($page == 12){
                include_once("controller/sup_picture.php");
                sup_picture();
            }
            elseif($page == 13){
                include_once("controller/ajout_admin.php");
                ajout_admin();
            }
            elseif($page == 14){
                include_once("controller/lagout_admin.php");
                dis_connect();
            }
            elseif($page == 15){
                include_once('controller/modific_category.php');
                select_category();
            }
            elseif($page == 16){
                include_once('controller/modific_picture.php');
                select_picture();
            }
            elseif($page == 17){
                include_once('controller/modific_product.php');
                select_product();
            }
            elseif($page == 18){
                include_once('controller/modific_subcategory.php');
                select_subcategory();
            }
            elseif($page == 19){
                include_once('controller/ajout_weight.php');
                ajout_weight();
            }
            elseif($page == 20){
                include_once('controller/gestion_weight.php');
                gestion_weight();
            }
            elseif($page == 21){
                include_once('controller/sup_weight.php');
                sup_weight();
            }
            elseif($page == 22) {
                include_once('controller/ajout_kindgrind.php');
                ajout_kindgrind();
            }
            elseif($page == 23) {
                include_once('controller/gestion_kindgrind.php');
                gestion_kindgrind();
            }
            elseif($page == 24) {
                include_once('controller/modific_kindgrind.php');
                select_kindgrind();
            }
            elseif($page == 25) {
                include_once('controller/sup_kindgrind.php');
                sup_kindgrind();
            }
            elseif($page == 26) {
                include_once('controller/modific_weight.php');
                select_weight();
            }
            elseif($page == 27) {
                include_once('controller/gestion_admin.php');
                gestion_admin();
            }
            else {
                include_once("index.php");
            }
        }
        else {
            include_once("index.php");
        }
    }
