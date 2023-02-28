<?php
function ajoutSsCategorie(string $name) {
    $ssCategorie = dbConnect();

    if (isset($_POST['submit'])) {
        if (isset($_POST['name']) || empty($_POST['name'])
        || (isset($_POST['chemin_picture'])) || empty($_POST['chemin_picture'])) {
            echo 'Il faut mettre un nom pour soumettre le formulaire.';
        }
        else {
            $nom = htmlspecialchars($_POST['name']);
            $category = $_POST['id_category'];
            $photo = $_POST['chemin_picture'];

            $query = "INSERT FROM sub_category VALUES(:name, :chemin_picture, :id_category)";
            $req = $ssCategorie->prepare($query);
            $req->bindValue(':chemin_picture', $photo, PDO::PARAM_STR);
            $req->bindValue(':id_category', $category, PDO::PARAM_INT);
            $req->bindValue(':name', $nom, PDO::PARAM_STR);
            $reponse = $req->execute();
        }
    }
}
function gestionSsCategorie() {
    $ssCategorie = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "SELECT * FROM sub_category WHERE nom = :nom";
        $req = $ssCategorie->prepare($query);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute(array("nom" => $nom));
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