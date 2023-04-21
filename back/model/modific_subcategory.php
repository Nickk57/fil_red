<?php

function selectSubCategory($id) {
    // $nom = htmlspecialchars($_GET['name']);
    
    $Query = 'SELECT * FROM sub_category WHERE id = :id';
    $Req = dbConnect()->prepare($Query);
    $Req->bindValue('id', $id, PDO::PARAM_INT);
    $Req->execute();
    $subCategory = $Req->fetch(PDO::FETCH_ASSOC);
    return $subCategory;


    // $query = 'UPDATE category SET name = :name WHERE id = :id';
    // $req = dbConnect()->prepare($query);
    // $req->bindValue(':id', $id, PDO::PARAM_INT);
    // $req->bindValue(':name', $nom, PDO::PARAM_STR);
    // $reponse = $req->execute();
    // if ($reponse > 0) {
        // $success = 'une category a étais modifié';
        // return $success;
    // }
}

function modificSubCategory($id) {

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