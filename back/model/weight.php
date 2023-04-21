<?php
function ajoutWeight() {

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "INSERT FROM product_weight VALUES(:id, :nom)";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', '', PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}
// gestion
function supWeight() {


    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM product_weight WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}