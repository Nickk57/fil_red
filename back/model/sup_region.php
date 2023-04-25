<?php

function supRegion() {

    $msg = '';

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = 'DELETE FROM region WHERE id = :id';
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = "La region est supprimer !";
    }
}