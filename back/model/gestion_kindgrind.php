<?php

function gestionKindgrind() {

    $query = 'SELECT k.id, k.name, p.path
    FROM kind_grind as k
    INNER JOIN picture as p
    ON k.id_picture = p.id';
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_kindgrind = $req->fetchAll();
    return $gest_kindgrind;
}

