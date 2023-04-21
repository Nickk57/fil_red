<?php

    function selectSubCategory() {
        $query = "SELECT * FROM sub_category";
        $req = dbConnect()->prepare($query);
        $req->execute();
        $subCategory = $req->fetchAll();
        return $subCategory;
    }

    function selectBrand($id) {
        $query = "SELECT id, name FROM sub_category WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $brand = $req->fetchAll();
        return $brand;
    }

    function selectProduct($id) {
        $query = "SELECT * FROM product WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $selProduct = $req->fetch(PDO::FETCH_ASSOC);
        return $selProduct;
    }

    function selectGrind() {
        $query = "SELECT * FROM kind_grind";
        $req = dbConnect()->prepare($query);
        $req->execute();
        $selGrind = $req->fetchAll();
        return $selGrind;
    }

    function brandGrind($id) {
        $query = "SELECT id, name FROM kind_grind WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $brandGrind = $req->fetchAll();
        return $brandGrind;
    }

    function modificProduct($id) {
        $nom = strip_tags($_POST['name']);
        $prix = strip_tags($_POST['price']);
        $description = strip_tags($_POST['description']);
        $composition = strip_tags($_POST['composition']);
        $provient = strip_tags($_POST['come_from']);
        $torrefateur = strip_tags($_POST['coffee']);
        $torrefie = strip_tags($_POST['roast']);
        $forets = strip_tags($_POST['forest']);
        $weight = strip_tags($_POST['weight']);
        $id_categ = strip_tags($_POST['id_subcategory']);

        $query = "UPDATE product SET id = :id, name = :name, price = :price, 
        description = :desription, compostion = :composition, comme_from = :come_from, 
        coffee = :coffee, roast = :roast, forest = :forest, id_subcategory = :id_subcategory 
        WHERE id = :id";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':name', $nom, PDO::PARAM_STR);
        $req->bindValue(':price', $prix);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':composition', $composition, PDO::PARAM_STR);
        $req->bindValue(':come_from', $provient, PDO::PARAM_STR);
        $req->bindValue(':coffee', $torrefateur, PDO::PARAM_STR);
        $req->bindValue(':roast', $torrefie, PDO::PARAM_STR);
        $req->bindValue(':forest', $forets, PDO::PARAM_STR);
        $req->bindValue(':weight', $weight, PDO::PARAM_STR);
        $req->bindValue(':id_subcategory', $id_categ, PDO::PARAM_INT);
        if($req->execute() > 0) {
            $success = "le product a étais modifie !";
            return $ $success;
        }
    }
