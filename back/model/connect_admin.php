<?php

function adminConnect() {

    if (isset($_POST["email"]) && !empty($_POST["email"]) 
    && isset($_POST["password"]) && !empty($_POST["password"]) 
    && isset($_POST["verifie"]) && !empty($_POST["verifie"])) {
        
        $email = htmlspecialchars($_POST['email']);
        $_SESSION["email"] = $email;
        $mdp = $_POST["password"];

        $query = "SELECT * FROM admin WHERE email = :email";
        $req = dbConnect()->prepare($query);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
        var_dump($reponse);
        $hash = $reponse["password"];

        if (password_verify($mdp, $hash)) {
            header("location: index.php");
        }
        else {
            echo 'le mot de passe est invalide. ';
        }
    }
}