<?php

function modificPicture() {

    $nom = htmlspecialchars($_POST['name']);

    if(isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $Query = 'SELECT * FROM category WHERE id = :id';
        $Req = dbConnect()->prepare($Query);
        $Req->bindValue('id', $id, PDO::PARAM_INT);
        $Req->execute();
        $transfer = $Req->fetch();

        

    }

    $query = 'UPDATE category SET name = :name WHERE id = :id';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $nom, PDO::PARAM_STR);
    $reponse = $req->execute();
    if ($reponse > 0) {
        $success = 'une category a étais modifié';
        return $success;
    }
}