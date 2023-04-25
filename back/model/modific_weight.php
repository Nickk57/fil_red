<?php

function selectWeight($id) {

    $query = 'SELECT * FROM weight WHERE id = :id';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $selWeight = $req->fetch(PDO::FETCH_ASSOC);
    return $selWeight;
}

function modificWeight($id) {
    $name = htmlspecialchars($_POST['name']);

    $query = "UPDATE weight SET name = :name WHERE id = :id";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->execute();
}