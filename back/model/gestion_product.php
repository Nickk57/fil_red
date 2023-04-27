<?php

function gestionProduct() {
    
    $query = "SELECT * FROM product";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_product = $req->fetchAll();
    return $gest_product;
}

function getPicturesByIdProduct($idProduct) {

    $query = "SELECT path FROM picture WHERE id_product = :id_product";
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id_product', $idProduct, PDO::PARAM_INT);
    $req->execute();
    $pictures = $req->fetchAll();
    return $pictures;
}