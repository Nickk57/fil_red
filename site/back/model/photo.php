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

                    $identifiant = time();
                    $nom = htmlspecialchars($_POST['name']);
                    $chemin = htmlspecialchars($_POST['chemin']);
            
                    $query = "INSERT * FROM picture VALUES(:id, :nom, :chemin)";
                    $req = $coPhoto->prepare($query);
                    $req->bindValue(':id', '', PDO::PARAM_INT);
                    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
                    $req->bindValue(':chemin', $chemin, PDO::PARAM_STR);
                    $req->execute();
                    $reponse = $req->fetch();
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
    // if(isset($_POST['name'])) {
    //     $identifiant = time();
    //     $nom = htmlspecialchars($_POST['name']);
    //     $chemin = htmlspecialchars($_POST['chemin']);

    //     $query = "INSERT * FROM picture VALUES(':id', ':nom', ':chemin')";
    //     $req = $coPhoto->prepare($query);
    //     $req->bindValue(':id', '', PDO::PARAM_INT);
    //     $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    //     $req->bindValue(':chemin', $chemin, PDO::PARAM_STR);
    //     $req->execute();
    //     $reponse = $req->fetch();

    // }
    
}
function gestionPhotos() {

}
function supPhoto() {
    $coPhoto = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM picture WHERE id = :id";
        $req = $coPhoto->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
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