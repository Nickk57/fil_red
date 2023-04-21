<?php

function gestionProduct() {

    $query ='SELECT p.id, p.name, pi.path
    FROM product as p
    INNER JOIN picture as pi
    ON p.id_picture = pi.id';
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_product = $req->fetchAll();
    return $gest_product;
}
