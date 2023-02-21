<?php

function dbConnect()
{
    $id = 'root';
    $mdp = '';
    try 
    {
        $database = new PDO('mysql:host=localhost;dbname=fil_red;charset=utf8',$id,$mdp);
        return $database;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function ajoutAdmin() {
    $msg = '';
    $admin = dbConnect();

    if (isset($_POST['submit'])) {
        if (!isset($_POST['email']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        || (!isset($_POST['mdp']) || empty($_POST['mdp'])) 
        || (!isset($_POST['nom']) || empty($_POST['nom'])) 
        || (!isset($_POST['prenom']) || empty($_POST['prenom']))) {
            echo 'Il faut remplir tous les champs pour soumettre le formulaire.';
            exit;
        }
        else {
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $prenom = strip_tags($_POST['prenom']);
            $nom = strip_tags($_POST['nom']);

            $query = 'INSERT INTO admin(email, nom, prenom, mdp) VALUES (:email, :nom, :prenom, :mdp)';
            $statement = $admin->prepare($query);
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
            $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindValue(':mdp', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $reponse = $statement->execute();
            return($msg > 0);
        }
    }
}

function adminConnect() {
    $admin = dbConnect();

    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["verifie"]) && !empty($_POST["verifie"])) {
        $email = htmlspecialchars($_POST['email']);
        $_SESSION["email"] = $email;
        $mdp = $_POST["password"];

        $query = "SELECT * FROM admin WHERE email = :email";
        $req = $admin->prepare($query);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
        // var_dump($reponse);
        $hash = $reponse["mdp"];

        if (password_verify($mdp, $hash)) {
            header("location: ../index.php");
        }
        else {
            echo 'le mot de passe est invalide. ';
        }
    }
}

//  les function ajout

function ajoutCategorie() {
    $categorie = dbConnect();

    if(isset($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "INSERT FROM category VALUES(:id, :nom)";
        $req = $categorie->prepare($query);

        $req->bindValue(':id','',PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();

    }
}
function ajoutSsCategorie() {
    $ssCategorie = dbConnect();

    if (isset($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $category = $_POST['id_category'];

        $query = "INSERT FROM sub_category VALUES(:id, :nom, :id_category)";
        $req = $ssCategorie->prepare($query);
        $req->bindValue(':id','', PDO::PARAM_INT);
        $req->bindValue(':id_category', $category, PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function ajoutProduit() {
    $coProduit = dbConnect();

    if (îsset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['description']) && !empty($_POST['description'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $caret = $_POST['caracteristisque'];

        $query = "INSERT FROM product VALUES(:id, :nom, :description, :prix, :caracteristisque)";
        $req = $coProduit->prepare($query);
        $req->bindValue(':id', '', PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue('prix', $prix, PDO::PARAM_STR);
        $req->bindValue(':caracteristisque', $caret, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function ajoutkingGrind() {
    $kindGrind = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "INSERT FROM kind_grind VALUES(:id, :nom)";
        $req = $kindGrind->prepare($query);
        $req->bindValue(':id', '', PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function ajoutWeight() {
    $produitweight = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "INSERT FROM product_weight VALUES(:id, :nom)";
        $req = $produitweight->prepare($query);
        $req->bindValue(':id', '', PDO::PARAM_INT);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
    }
}

//  les function gestion

function getionCategorie() {
    $categorie = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = 'SELECT * FROM category WHERE nom = :nom';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->bindValue(':nom',$nom, PDO::PARAM_STR);
        $nomCateg->execute(array("nom" => $nom));
    }
    else {
        $query = 'SELECT * FROM category';
        $nomCateg = $categorie->prepare($query);
        $nomCateg->execute();
    }
    $nom = $nomCateg->fetch();
}
function gestionSsCategorie() {
    $ssCategorie = dbConnect();

    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $nom = htmlspecialchars($_POST['nom']);

        $query = "SELECT * FROM sub_category WHERE nom = :nom";
        $req = $ssCategorie->prepare($query);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->execute(array("nom" => $nom));
    }
    else {
        $query = "SELECT * FROM sub_category";
        $req = $ssCategorie->prepare($query);
        $req->execute();
    }
    $nom_sscategory = $req->fetch();
}
function gestionProduct() {
    $coProduit = dbConnect();

    if (isset($_POST['nom']) && !empty('nom') && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['prix']) && !empty($_POST['prix']) && isset($_POST['caracteristique']) && !empty($_POST['caracteristique'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $prix = htmlspecialchars($_POST['prix']);
        $caracteristique = htmlspecialchars($_POST['caracteristique']);

        $query = "SELECT * FROM product WHERE nom = :nom, description = :description, prix = :prix, caracteristique = :caracteristique";
        $req = $coProduit->prepare($query);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue('prix', $prix, PDO::PARAM_STR);
        $req->bindValue(':caracteristique', $caracteristique, PDO::PARAM_STR);
        $req->execute(
            array("nom" => $nom),
            array("desciption" => $description),
            array("prix" => $prix),
            array("caracteristique" => $caracteristique)
        );
    }
    else {
        $query = "SELECT * FROM product";
        $req = $coProduit->prepare($query);
        $req->execute();
    }
    $nom_product = $req->fetch();
}

// function supprime

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
// function supSubCategory() {
//     $ssCategorie = dbConnect();

//     if(isset($_POST['id'])) {
//         $id = strval($_GET['id'])

//         $query = "DELETE FROM sub_category WHERE id = :id";
//         $req = $ssCategorie->prepare($query);
//         $req->bindValues('id', $id, PDO::PARAM_INT);
//         $req->execute();
//         $msg = "sous-categorie supprimer !";
//     }
//         $query = "SELECT FROM sub_category";
//         $req = $ssCategorie->prepare($query);
//         $req->execute();
//         $reponse = $req->fetch();
// }
function supProduct() {
    $coProduit = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM product WHERE id = :id";
        $req = $coProduit->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function supPhoto() {
    $coPhoto = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM picture WHERE id = :id";
        $req = $coPhoto->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function supKindGrind() {
    $coKind = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM kind_grind WHERE id = :id";
        $req = $coKind->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}
function supWeight() {
    $coWeight = dbConnect();

    if(isset($_POST['id'])) {
        $id = strval($_GET['id']);

        $query = "DELETE FROM product_weight WHERE id = :id";
        $req = $coWeight->prepare($query);
        $req->bindValues('id', $id, PDO::PARAM_INT);
        $req->execute();
        $reponse = $req->fetch();
    }
}