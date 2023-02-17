<?php
    session_start();
    include_once('ajout_admin/connexion.php');
    include_once('include/bar_nav.php');
    include_once('front/produit.php');
    
    try {
        if (isset($_GET['']) & $_GET[''] !== '') {
            if ($_GET[''] === 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    $identifier = $_GET['id'];
                    post($identifier);
                }
                else {
                    throw new Exception('Aucun identifiant de admin envoyé');
                }
            }
            elseif ($_GET[''] === 'addAdmin') {
                if (isset($_GET['id']) && $_GET['id'] > 0){
                    $identifier = $_GET['id'];
                    addAdmin($identifier, $_POST);
                }
                else {
                    throw new Exception('Aucun identifiant d\'admin envoyer');
                }
            }
            else {
                throw new Exception('Aucun identifiant d\'admin anvoyer');
            }
        }
        else {
            homepage();
        }
    }
    catch (Exception $e) {
        $errorMessage = $e->getMessage();

        require('templates/error.php');
    }