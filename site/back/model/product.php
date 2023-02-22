<?php
function ajoutProduit() {
    $coProduit = dbConnect();

    if (îsset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['description']) && !empty($_POST['description'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $caret = $_POST['caracteristisque'];

        $query = "INSERT FROM product VALUES(:id, :nom, :description, :prix, :caracteristisque)";
        $req = $coProduit->prepare($query);
        $req->bindValue(':id', '', PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prix', $prix, PDO::PARAM_STR);
        $req->bindValue(':caracteristisque', $caret, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function gestionProduct() {
    $coProduit = dbConnect();

    if (isset($_POST['nom']) && !empty('nom') && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['caracteristique']) && !empty($_POST['caracteristique'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $prix = htmlspecialchars($_POST['prix']);
        $caracteristique = htmlspecialchars($_POST['caracteristique']);

        $query = "SELECT * FROM product WHERE nom = :nom, description = :description, prix = :prix, caracteristique = :caracteristique";
        $req = $coProduit->prepare($query);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue('prix', $prix, PDO::PARAM_STR);
        $req->bindValue(':caracteristique', $caracteristique, PDO::PARAM_STR);
        $req->execute(
            array("nom" => $nom),
            array("desciption" => $description),
            array("prix" => $prix),
            array("caracteristique" => $caracteristique)
        );
    }
    else {
        $query = "SELECT * FROM product";
        $req = $coProduit->prepare($query);
        $req->execute();
    }
    $nom_product = $req->fetch();
}
function supProduct() {
    $coProduit = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM product WHERE id = :id";
        $req = $coProduit->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}