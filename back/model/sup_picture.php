<?php

function supPicture() {

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM picture WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = 'la photo est supprimer !';
    }
}