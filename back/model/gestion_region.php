<?php

function gestionRegion() {

    $query = 'SELECT * FROM region';
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_region = $req->fetchAll();
    return $gest_region;
}

