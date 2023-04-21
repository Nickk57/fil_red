<?php

    function supAdmin() {
        $msg = '';

        if(isset($_GET['id'])) {
            $id = strval($_GET['id']);

            $query = 'DELETE FROM admin WHERE id = :id';
            $req = dbConnect()->prepare($query);
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();
            $msg = "L'admin est supprimer !";
        }
    }