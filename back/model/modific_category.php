<?php

function selectCategory($id) {

    $Query = 'SELECT * FROM category WHERE id = :id';
    $Req = dbConnect()->prepare($Query);
    $Req->bindValue(':id', $id, PDO::PARAM_INT);
    $Req->execute();
    $selCategory = $Req->fetch(PDO::FETCH_ASSOC);
    return $selCategory;

}

// function modifieCategory() {
    // $coCategory = dbConnect();
    // $nom = htmlspecialchars($_POST['name']);

    // $query = 'UPDATE category SET name = :name WHERE id = :id';
    // $req = $coCategory->prepare($query);
    // $req->bindValue(':id', $id, PDO::PARAM_INT);
    // $req->bindValue(':name', $nom, PDO::PARAM_STR);
    // $reponse = $req->execute();
    // if ($reponse > 0) {
        // $success = 'une category a étais modifié';
        // return $success;
    // }
// }