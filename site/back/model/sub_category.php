<?php
function ajoutSsCategorie() {
    $ssCategorie = dbConnect();

    if (isset($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $category = $_POST['id_category'];

        $query = "INSERT FROM sub_category VALUES(:id, :nom, :id_category)";
        $req = $ssCategorie->prepare($query);
        $req->bindValue(':id','', PDO::PARAM_INT);
        $req->bindValue(':id_category', $category, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
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
function supSubCategory() {
    $ssCategorie = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id'])

        $query = "DELETE FROM sub_category WHERE id = :id";
        $req = $ssCategorie->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = "sous-categorie supprimer !";
    }
        $query = "SELECT FROM sub_category";
        $req = $ssCategorie->prepare($query);
        $req->execute();
        $reponse = $req->fetch();
}