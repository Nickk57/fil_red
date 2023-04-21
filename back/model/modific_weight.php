<?php

function selectWeight($id) {

    $query = 'SELECT * FROM product_weight WHERE id = :id';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $selWeight = $req->fetch(PDO::FETCH_ASSOC);
    return $selWeight;
}