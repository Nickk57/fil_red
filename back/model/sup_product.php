<?php

function supProduct() {

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM product WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = 'le produit est supprimer !';
    }
}