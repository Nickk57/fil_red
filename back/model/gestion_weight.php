<?php

function gestionWeight() {

    $query = 'SELECT * FROM product_weight';
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_weight = $req->fetchAll();
    return $gest_weight;
}