<?php

function selectCategory() {
    $coCategorie = dbConnect();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);
        $query = "
        SELECT category.name, sub_category.name, sub_category.chemin_picture
        FROM category
        INNER JOIN sub_category ON sub_category.id_category = id_category";
        $req = $coCategorie->prepara($query);
        $req->bindValue(':name', $nom, PDO::PARAM_STR);
        $req->bindValue(':chemin_picture', $photo, PDO::PARAM_STR);
        $reponse = $req->execute(array(
            'name' => $name
        ));
    }
}

// function selectCategory() {
//     $coCategorie = dbConnect();

//     if (isset($_POST['name']) && !empty($_POST['name'])) {
//         $nom = htmlspecialchars($_POST['name']);
//         $query = "SELECT * FROM category WHERE name = :name";
//         $req = $coCategorie->prepare($query);
//         $req->bindValue(':name', $nom, PDO::PARAM_STR);
//         $req->execute(array(
//             "name" => $name
//         ));
//     }
//     elseif (isset($_POST['Reinitialiser'])) {
//         $query = "SELECT * FROM category";
//         $req = $coCategorie->prepare($query);
//         $req->execute();
//     }
//     else {
//         $query = "SELECT * FROM category";
//         $req = $coCategorie->prepare($query);
//         $req->execute();
//     }
//     $nomCateg = $req->fetchAll();
// }