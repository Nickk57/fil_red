<?php

function gestionAdmin() {

    $query = 'SELECT * FROM admin';
    $req = dbConnect()->prepare($query);
    $req->execute();
    $gest_admin = $req->fetchAll();
    return $gest_admin;
}