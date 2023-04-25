<?php

function gestionSubCategory() {

    $query = "SELECT s.id, s.name, pi.path
    FROM sub_category as s
    INNER JOIN picture as pi
    ON s.id_picture = pi.id";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_subCategory = $req->fetchAll(PDO::FETCH_ASSOC);
    return $gest_subCategory;

}