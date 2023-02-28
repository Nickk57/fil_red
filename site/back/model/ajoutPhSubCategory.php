<?php
    function ajoutPhSubCategory(string $namePicture, string $chemin) {
        $coPhoto = dbConnect();

        if (isset($_POST['nom'])  || !empty($_POST['nom'])
        || isset($_POST['chemin']) || !empty($_POST['chemin'])) {
            echo "Il faut un nom valide !";
            exit;
        }
        else {
            $uploads_dir = 'uploads/';

            if(isset($_POST['photo']) && $_FILES['photo']['error'] == 0) {
                if($_FILES['photo']['size'] <= 1000000) {
                    $fileInfo = pathinfo($_FILES['photo']['name']);
                    $extention = $fileInfo['extention'];
                    $allowedExtention = ['jpg', 'jpeg', 'gif', 'png', 'bmp'];

                    if(in_array($extention, $allowedExtention)) {
                        move_uploaded_file($_FILES['photo']['tmp_name'], $uploads_dir. basename($_FILES['photo']['name']));
                        $photo = $uploads_dir . basename($_FILES['photo']['name']);

                        $identifiant = time();
                        $nom = htmlspecialchars($_POST['name']);
                        $chemin = htmlspecialchars($_POST['chemin']);

                        $query = "INSERT * FROM sub_category- VALUES (:id, :nom :chemin)";
                        $req = $coPhoto->prepare($query);
                        $req->bindValue(':id','',PDO::PARAM_INT);
                        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
                        $req->bindValue(':chemin', $chemin, PDO::PARAM_STR);
                        $req->execute();
                        $reponse = $req->fetch();
                        echo "L'envoi a bien été éfféctué !";
                    }
                    else {
                        echo "Le format de fichier n'est pas autorisée. Merci de n'evoyer que des fichier en (jpg, jpeg, gif, png, bmp)";
                        exit;
                    }
                }
                else {
                    echo "Le fichier dépasse la taille autorisée !";
                    exit;
                }
            }
            else {
                echo "Le fichier n'a pas été envoyé correctement";
                exit;
            }
        }

    }