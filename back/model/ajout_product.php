<?php

function selectSubCategory() {
    $query = "SELECT * FROM sub_category";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $subCategory = $req->fetchAll();
    return $subCategory;
}
function selectRegion() {
    $query = "SELECT * FROM region";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $sel_region = $req->fetchAll();
    return $sel_region;
}
function selectWeight() {
    $query = "SELECT * FROM weight";
    $req = dbConnect()->prepare($query);
    $req->execute();
    $sel_weight = $req->fetchAll();
    return $sel_weight;
}

function ajoutPicture_product() {
    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $success = "Il faut un nom et une image pour validé !";
        return $success;
    }
    else {        
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);
        $prix = strip_tags($_POST['price']);
        $character = strip_tags($_POST['characte']);
        $flavour = strip_tags($_POST['flavour']);
        $cooperative = strip_tags($_POST['cooperative']);
        $namePicture = strip_tags($_POST['namePicture']);
        $id_subcategory = strip_tags($_POST['subcategory']);
        $id_region = strip_tags($_POST['region']);
        $id_weight = strip_tags($_POST['weight']);
        

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
                    ajoutProduct($name, $description, $prix, $character, 
                    $flavour, $cooperative, $id_subcategory, $id_region, 
                    $id_weight, $namePicture, $pictureCh);
                    
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


    function ajoutProduct($name, $description, $prix, $character, 
    $flavour, $cooperative, $id_subcategory, $id_region, 
    $id_weight, $namePicture, $pictureCh){

        $query = "INSERT INTO product (name, description, price, characte, flavour, cooperative, 
        id_subcategory, id_region, id_weight) VALUES (:name, :description, :price, 
        :characte, :flavour, :cooperative, :id_subcategory, :id_region, :id_weight)";
        
        $req = dbConnect()->prepare($query);
        
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':price', $prix);
        $req->bindValue(':characte', $character, PDO::PARAM_STR);
        $req->bindValue(':flavour', $flavour, PDO::PARAM_STR);
        $req->bindValue(':cooperative', $cooperative, PDO::PARAM_STR);
        $req->bindValue(':id_subcategory', $id_subcategory, PDO::PARAM_INT);
        $req->bindValue(':id_region', $id_region, PDO::PARAM_INT);
        $req->bindValue(':id_weight', $id_weight, PDO::PARAM_INT);
        $req->execute();
        
        $query = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->execute();
        $productID = $req->fetch();
        AjoutPictureBDD($namePicture, $productID[0], $pictureCh);
    }



function ajoutPictureBDD($namePicture, $productID, $pictureCh) {
    
    $query = 'INSERT INTO picture (name, path, id_product) 
    VALUES (:name, :path, :id_product)';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $namePicture, PDO::PARAM_STR);
    $req->bindValue(':path', $pictureCh, PDO::PARAM_STR);
    $req->bindValue(':id_product', $productID, PDO::PARAM_INT);
    $reponse = $req->execute();

    if($reponse > 0) {
        $success = 'envoie de photo est ajouter';
        return $success;
    }
}