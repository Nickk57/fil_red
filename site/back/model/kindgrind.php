<?php
function ajoutkingGrind() {
    $kindGrind = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "INSERT FROM kind_grind VALUES(:id, :nom)";
        $req = $kindGrind->prepare($query);
        $req->bindValue(':id', '', PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}
// gestion
function supKindGrind() {
    $coKind = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM kind_grind WHERE id = :id";
        $req = $coKind->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}