<?php

function supCategory() {
    $msg = "";

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = 'DELETE FROM category WHERE id = :id';
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        var_dump($req);
        $msg = " la categorie est supprimer !";
    }    
}