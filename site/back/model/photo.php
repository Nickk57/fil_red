<?php

function ajoutPhoto(string $name, string $chemin) {

    if(isset($_POST['nom']) || !empty($_POST['nom']) || isset($_POST['chemin']) || !empty($_POST['chemin'])) {
        echo "Il faut un nom validé !";
        exit;
    }
    else {
        $uploads_dir = 'uploads/';

        if(isset($_FILES['photos']) && $_FILES['photos']['error'] == 0) {
            if($_FILES['photos']['size'] <= 1000000) {
                $fileInfo = pathinfo($_FILES['photos']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtension = ['jpg', 'jpeg', 'gif', 'png', 'bmp'];

                if(in_array($extension, $allowedExtension)) {
                    move_uploaded_file($_FILES['photos']['tmp_name'], $uploads_dir. basename($_FILES['photos']['name']));
                    $photo = $uploads_dir . basename($_FILES['photos']['name']);
                    echo "L'envoi a bien été effectué !";
                }
                else {
                    echo "Le format de fichier n'est pas autorisée. Merci de n'envoyer que des fichier en (jpg, jpeg, gif, png, bmp)";
                    exit;
                }
            }
            else {
                echo "Le fichier dépasse la taille autorisée !";
                exit;
            }
        }
        else {
            echo "Le fichier n'a pas été envoyé correctement !";
            exit;
        }
    }
    
}
function gestionPhotos() {

}
function supPhotos() {

}
function photoDbConnect() {
    try {
        $database = new PDO('mysql:host=localhost;dbname=fil_red;charset=utf8', 'root', '');
        return $database;
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}