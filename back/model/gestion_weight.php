<?php

function gestionWeight() {

    $query = 'SELECT * FROM weight';
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_weight = $req->fetchAll();
    return $gest_weight;
}