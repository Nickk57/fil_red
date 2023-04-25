<?php

function selectSubCategory($id) {
    // $nom = htmlspecialchars($_GET['name']);
    
    $Query = "SELECT s.id, s.name, pi.path
    FROM sub_category as s
    INNER JOIN picture as pi
    ON s.id_picture = pi.id";
    $Req = dbConnect()->prepare($Query);
    $Req->bindValue(':id', $id, PDO::PARAM_INT);
    $Req->execute();
    $subCategory = $Req->fetch(PDO::FETCH_ASSOC);
    return $subCategory;

}

function modificSubCategory($id) {
    $name = strip_tags($_POST['name']);
    $id_category = strip_tags($_POST['id_category']);
    $id_picture = strip_tags($_POST['id_picture']);

    $query = 'UPDATE sub_category SET id = :id, name = :name, 
    id_picture = :id_picture, id_category = :id_category WHERE id = :id';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':id_category', $id_category, PDO::PARAM_INT);
    $req->bindValue(':id_picture', $id_picture, PDO::PARAM_INT);
    $reponse = $req->execute();
    if ($reponse > 0) {
        $success = 'une category a étais modifié';
        return $success;
    }
}

function selectPicture($id) {
     
    $query = "SELECT id FROM picture WHERE id = :id";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $gestion_picture = $req->fetch(PDO::FETCH_ASSOC);
    return $gestion_picture;
}