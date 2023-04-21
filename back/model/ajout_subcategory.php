<?php

    function selectCategory() {
        $query = "SELECT * FROM category";
        $req = dbConnect()->prepare($query);
        $req->execute();
        $category = $req->fetchAll();
        return $category;
    }
    
    function ajoutSubCategory() {

        if (!isset($_POST['name']) || empty($_POST['name'])) {
            $success = "il faut un nom valide !";
            return $success;
        } else {
            $name = strip_tags($_POST['name']);
            $id_categ = strip_tags($_POST['id_category']);

            $query = "INSERT INTO sub_category (name, id_category) 
            VALUES (:name, :id_category)";
            $req = dbConnect()->prepare($query);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':id_category', $id_categ, PDO::PARAM_INT);
            if($req->execute() > 0){
                $success = "ajoute à étais fait !";
                return $success;
            }
        }

    }
