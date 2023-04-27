<?php

    require_once('view/bar_nav.php');
    require_once('../back/model/model.php');

    if(isset($_GET['page']) && $_GET['page'] !=null) {
        $page = strval($_GET['page']);

        if($page == 1){
            include_once('view/accueil.php');
        }
        elseif($page == 2){
            include_once('view/cafe_grain.php');
        }
        elseif($page == 2){
            include_once('view/cafe_moulu.php');
        }
        elseif($page == 3){
            include_once('view/cafe_capsule.php');
        }
        elseif($page == 4){
            include_once('view/contact.php');
        }
        elseif($page == 5){
            include_once('view/compte.php');
        }
        elseif($page == 6){
            include_once('view/panier.php');
        }
        else {
            include_once("index.php");
        }
    }