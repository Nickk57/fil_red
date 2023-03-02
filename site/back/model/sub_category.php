<?php
function ajoutSsCategorie(string $name) {
    $ssCategorie = dbConnect();

    if (isset($_POST['submit'])) {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            echo 'Il faut mettre un nom pour soumettre le formulaire.';
        }
        else {
            $nom = strip_tags($_POST['name']);

            $query = "INSERT INTO sub_category (name) VALUES (:name)";
            $req = $ssCategorie->prepare($query);
            $req->bindValue(':name', $nom, PDO::PARAM_STR);
            $reponse = $req->execute();
        }
    }
}
function gestionSsCategorie() {
    $ssCategorie = dbConnect();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);

        $query = "SELECT * FROM sub_category WHERE name = :name";
        $req = $ssCategorie->prepare($query);
        $req->bindValue(':name', $nom, PDO::PARAM_STR);
        $req->execute(array("name" => $nom));
    }
    else {
        $query = "SELECT * FROM sub_category";
        $req = $ssCategorie->prepare($query);
        $req->execute();
    }
    $nom_sscategory = $req->fetch();
}
// function supSubCategory() {
//     $ssCategorie = dbConnect();

//     if(isset($_POST['id'])) {
//         $id = strval($_GET['id'])

//         $query = "DELETE FROM sub_category WHERE id = :id";
//         $req = $ssCategorie->prepare($query);
//         $req->bindValues('id', $id, PDO::PARAM_INT);
//         $req->execute();
//         $msg = "sous-categorie supprimer !";
//     }
//         $query = "SELECT FROM sub_category";
//         $req = $ssCategorie->prepare($query);
//         $req->execute();
//         $reponse = $req->fetch();
// }