<?php

// function dbConnect()
// {
//     $id = 'root';
//     $mdp = '';
//     try 
//     {
//         $database = new PDO('mysql:host=localhost;dbname=fil_red;charset=utf8',$id,$mdp);
//         return $database;
//     }
//     catch(Exception $e)
//     {
//         die('Erreur : '.$e->getMessage());
//     }
// }

function ajoutCategory() {
    $categorie = dbConnect();

    if(isset($_POST['submit'])) {
        if(!isset($_POST['name']) || empty($_POST['name'])) {
            echo 'Il faut mettre un nom pour soumettre le formulaire.';
        }
        else{
            $nom = strip_tags($_POST['name']);

            $query = "INSERT INTO category (name) VALUES (:name)";
            $req = $categorie->prepare($query);
            $req->bindValue(':name', $nom, PDO::PARAM_STR);
            $reponse = $req->execute();
        }
    }
}

function getionCategorie() {
    $categorie = dbConnect();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);

        $query = 'SELECT * FROM category WHERE name = :name';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->bindValue(':name',$nom, PDO::PARAM_STR);
        $nomCateg->execute(array("name" => $nom));
    }
    else {
        $query = 'SELECT * FROM category';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->execute();
    }
    $nom = $nomCateg->fetch();
}

function supCategorie() {
    $categorie = dbConnect();

    if(isset($_GET['id'])) {
        $id = strval($_GET['id']);

        $query = 'DELETE FROM category WHERE id = :id';
        $req = $categorie->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $msg = "categorie supprimer !";
    }    
        $query = 'SELECT * FROM category';
        $req = $categorie->prepare($query);
        $req->execute();
        $reponse = $req->fetch();
}

function selectCategory() {
    $cocategorie = dbConnect();

    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $nom = htmlspecialchars($_POST['name']);
        $query = "SELECT * FROM category WHERE name = :name";
        $req = $cocategorie->prepare($query);
        $req->bindValue(':name', $nom, PDO::PARAM_STR);
        $req->execute(array(
            "name" => $nomCategory,
        ));
    }
    elseif (isset($_POST['Reinitialiser'])) {
        $query = "SELECT * FROM category";
        $req = $cocategorie->prepare($query);
        $req->execute();
    }
    else {
        $query = "SELECT * FROM category";
        $req = $cocategorie->prepara($query);
        $req->execute();
    }
    $categorie = $req->fetchAll();
}