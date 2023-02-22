<?php
function ajoutCategorie() {
    $categorie = dbConnect();

    if(isset($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "INSERT FROM category VALUES(:id, :nom)";
        $req = $categorie->prepare($query);

        $req->bindValue(':id','',PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();

    }
}
function getionCategorie() {
    $categorie = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = 'SELECT * FROM category WHERE nom = :nom';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->bindValue(':nom',$nom, PDO::PARAM_STR);
        $nomCateg->execute(array("nom" => $nom));
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