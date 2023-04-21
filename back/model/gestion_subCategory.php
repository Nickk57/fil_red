<?php

function gestionSubCategory() {

    $query = "SELECT * FROM sub_category";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_subCategory = $req->fetchAll();
    return $gest_subCategory;

}