<?php

function ajoutAdmin() {
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    $prenom = strip_tags($_POST['first_name']);
    $nom = strip_tags($_POST['name']);
    
    $query = 'INSERT INTO admin (email, name, first_name, password) VALUES (:email, :name, :first_name, :password)';
    $req = dbConnect()->prepare($query);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':first_name', $prenom, PDO::PARAM_STR);
    $req->bindValue(':name', $nom, PDO::PARAM_STR);
    $req->bindValue(':password', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
    $success = $req->execute();
    return $success;
    
}