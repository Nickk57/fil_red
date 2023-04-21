<?php

function supSubCategory() {

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM sub_category WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = "la sous-categorie est supprimer !";
    }
}