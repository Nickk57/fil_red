<?php

function gestionPicture() {

    $query = "SELECT * FROM picture";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_picture = $req->fetchAll();
    return $gest_picture;
}