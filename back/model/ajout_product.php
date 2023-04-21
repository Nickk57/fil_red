<?php

function selectSubCategory() {
    $query = "SELECT * FROM sub_category";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $subCategory = $req->fetchAll();
    return $subCategory;
}

function ajoutPicture_product() {
    if (!isset($_POST['name']) || empty($_POST['name'])
    || !isset($_POST['prix']) || empty($_POST['prix'])
    || !isset($_POST['description']) || empty($_POST['description'])
    || !isset($_POST['composition']) || empty($_POST['composition'])
    || !isset($_POST['come_from']) || empty($_POST['come_from'])
    || !isset($_POST['coffee']) || empty($_POST['coffee'])
    || !isset($_POST['roast']) || empty($_POST['roast'])
    || !isset($_POST['forest']) || empty($_POST['forest'])
    || !isset($_POST['weight']) || empty($_POST['weight'])
    || !isset($_POST['namePicture']) || empty($_POST['namePicture'])
    || !isset($_FILES['picture']) || empty($_FILES['picture'])) {
        $success = "Il faut un nom et une image pour validé !";
        return $success;
    }
    else {        
        $name = strip_tags($_POST['name']);
        $prix = strip_tags($_POST['price']);
        $description = strip_tags($_POST['description']);
        $composition = strip_tags($_POST['composition']);
        $provient = strip_tags($_POST['come_from']);
        $torrefateur = strip_tags($_POST['coffee']);
        $torrefie = strip_tags($_POST['roast']);
        $forets = strip_tags($_POST['forest']);
        $weight = strip_tags($_POST['weight']);
        $id_categ = strip_tags($_POST['id_subcategory']);
        $namePicture = strip_tags($_POST['namePicture']);
        $pictureCh = strip_tags($_POST['picture']);

        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            if ($_FILES['picture']['size'] <= 1000000) {
                $fileInfo = pathinfo($_FILES['picture']['name']);
                $extention = $fileInfo['extension'];
                $allowedExtention = ['jpg', 'jpeg', 'gif', 'png', 'webp', 'svg'];

                if (in_array($extention, $allowedExtention)) {
                    move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'. basename($_FILES['picture']['name']));
                    $photo = 'uploads/'. basename($_FILES['picture']['name']);
                    echo "L'envoi a bien été effectué !";
                    $pictureCh = strip_tags('uploads/'. $_FILES['picture']['name']);
                    ajoutPictureBDD($name, $prix, $description, $composition, 
                    $provient, $torrefateur, $torrefie, $forets, $weight, 
                    $id_categ, $namePicture, $pictureCh);
                }
                else {
                    echo "Le format de fichier n'est pas autorisée. Merci de n'envoyer que des fichers en (.jpg, .jpeg, .png, .gif)";
                    exit;
                }
            }
            else {
                echo "Le fichier dépasse la taille autorisée !";
                exit;
            }
        }
        else {
            echo "Le fichier n'a pas été envoyé correctement !";
            exit;
        }
    }
}


    function ajoutProduct($name, $prix, $description, $composition, $provient, 
    $torrefateur, $torrefie, $forets, $weight, $id_categ, $namePicture, $pictureCh){
        
        $query = "INSERT INTO product (name, price, description, composition, come_form, 
        coffee, roast, forest, weight, id_subcategory) VALUES (:name, :price, :desciption, 
        :composition, :come_form, :coffee, :roast, :forest, :weight, :id_subcategory)";

        $req = dbConnect()->prepare($query);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':price', $prix);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':composition', $composition, PDO::PARAM_STR);
        $req->bindValue(':come_form', $provient, PDO::PARAM_STR);
        $req->bindValue(':coffee', $torrefateur, PDO::PARAM_STR);
        $req->bindValue(':roast', $torrefie, PDO::PARAM_STR);
        $req->bindValue(':forest', $forets, PDO::PARAM_STR);
        $req->bindValue(':weight', $weight, PDO::PARAM_STR);
        $req->bindValue(':id_category', $id_categ, PDO::PARAM_STR);
        $req->execute();

        $query = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();
        $productID = $req->fetch();
        AjoutPictureBDD($name, $productID[0], $pictureCh);
    }



function ajoutPictureBDD($name, $productID, $pictureCh) {
    
    $query = 'INSERT INTO picture (name, path, id_product) 
    VALUES (:name, :path, :id_product)';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':path', $pictureCh, PDO::PARAM_STR);
    $req->bindValue(':id_product', $productID, PDO::PARAM_INT);
    $reponse = $req->execute();

    if($reponse > 0) {
        $success = 'envoie de photo est ajouter';
        return $success;
    }
}