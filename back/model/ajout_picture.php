<?php
// var_dump(ajoutPicture());
function ajoutPicture() {
    if (!isset($_POST['name']) || empty($_POST['name'])
    || !isset($_POST['nameGrind']) || empty($_POST['nameGrind'])
    || !isset($_FILES['picture']) || empty($_FILES['picture'])) {
        $success = "Il faut un nom et une image pour validé !";
        return $success;
    }
    else {        
        $name = strip_tags($_POST['name']);
        $nameGrind = strip_tags($_POST['nameGrind']);

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
                    ajoutPictureBDD($name, $pictureCh, $nameGrind);
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

function ajoutPictureBDD($name, $pictureCh, $nameGrind) {
    
    $query = 'INSERT INTO picture (name, path) VALUES (:name, :path)';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':path', $pictureCh, PDO::PARAM_STR);
    $reponse = $req->execute();

    if($reponse > 0) {
        $success = 'envoie de photo est ajouter';
        editKindgrind($name, $nameGrind);
        return $success;
    }
}

function editKindgrind($name, $nameGrind) {
    
    $idPicture = 'SELECT id FROM picture WHERE name = :name';
    $req = dbConnect()->prepare($idPicture);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->execute();
    $pictureID = $req->fetchAll();
    writeKindgrind($pictureID[0]['id'], $nameGrind);

}

function writeKindgrind($pictureID, $nameGrind) {

    $query = 'INSERT INTO kind_grind (id_picture, name) VALUES (:id_picture, :name)';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':id_picture', $pictureID, PDO::PARAM_INT);
    $req->bindValue(':name', $nameGrind, PDO::PARAM_STR);
    $req->execute();
}