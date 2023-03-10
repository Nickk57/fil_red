<?php

function ajoutCategory(string $name, string $post) {
    $categorie = dbConnect();

    $query = "INSERT INTO category (name) VALUES (:name)";
    $req = $categorie->prepare($query);
    $reponse = $req->execute([$post, $name]);
    return ($reponse > 0);

    // if(isset($_POST['submit'])) {
    //     if(!isset($_POST['name']) || empty($_POST['name'])) {
    //         echo 'Il faut mettre un nom pour soumettre le formulaire.';
    //     }
    //     else{
    //         $nom = strip_tags($_POST['name']);

    //         $query = "INSERT INTO category (name) VALUES (:name)";
    //         $req = $categorie->prepare($query);
    //         $req->bindValue(':name', $nom, PDO::PARAM_STR);
    //         $reponse = $req->execute();
    //     }
    // }
}

function getionCategorie() {
    $categorie = dbConnect();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);

        $query = 'SELECT * FROM category WHERE name = :name';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->bindValue(':name',$nom, PDO::PARAM_STR);
        $nomCateg->execute(array("name" => $nom));
    }
    else {
        $query = 'SELECT * FROM category';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->execute();
    }
    $nom = $nomCateg->fetch();
}

function supCategorie() {
    $categorie = dbConnect();
    $msg = "";

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = 'DELETE FROM category WHERE id = :id';
        $req = $categorie->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = "categorie supprimer !";
    }    
        $query = 'SELECT * FROM category';
        $req = $categorie->prepare($query);
        $req->execute();
        $reponse = $req->fetch();
}

function selectCategory() {
    $coCategorie = dbConnect();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);
        $query = "
        SELECT category.name, sub_category.name, sub_category.chemin_picture
        FROM category
        INNER JOIN sub_category ON sub_category.id_category = id_category";
        $req = $coCategorie->prepara($query);
        $req->bindValue(':name', $nom, PDO::PARAM_STR);
        $req->bindValue(':chemin_picture', $photo, PDO::PARAM_STR);
        $reponse = $req->execute(array(
            'name' => $name
        ));
    }
}

// function selectCategory() {
//     $coCategorie = dbConnect();

//     if (isset($_POST['name']) && !empty($_POST['name'])) {
//         $nom = htmlspecialchars($_POST['name']);
//         $query = "SELECT * FROM category WHERE name = :name";
//         $req = $coCategorie->prepare($query);
//         $req->bindValue(':name', $nom, PDO::PARAM_STR);
//         $req->execute(array(
//             "name" => $name
//         ));
//     }
//     elseif (isset($_POST['Reinitialiser'])) {
//         $query = "SELECT * FROM category";
//         $req = $coCategorie->prepare($query);
//         $req->execute();
//     }
//     else {
//         $query = "SELECT * FROM category";
//         $req = $coCategorie->prepare($query);
//         $req->execute();
//     }
//     $nomCateg = $req->fetchAll();
// }