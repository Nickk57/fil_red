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
    if (isset($_POST['submit'])) {
        if (!isset($_POST['email']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        || (!isset($_POST['mdp']) || empty($_POST['mdp'])) 
        || (!isset($_POST['nom']) || empty($_POST['nom'])) 
        || (!isset($_POST['prenom']) || empty($_POST['prenom']))) {
            echo 'Il faut remplir tous les champs pour soumettre le formulaire.';
            exit;
        }
        else {    
            $admin = dbConnect();

            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $prenom = strip_tags($_POST['prenom']);
            $nom = strip_tags($_POST['nom']);

            $statement = $admin->prepare(
                'INSERT INTO admin(email, nom, prenom, mdp) VALUES (:email, :nom, :prenom, :mdp)'
            );
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
            $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindValue(':mdp', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $confire = $statement->execute();
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