<?php

function dbConnect()
{
    $id = 'root';
    $mdp = '';
    try 
    {
        $database = new PDO('mysql:host=localhost;dbname=cafe;charset=utf8',$id,$mdp);
        return $database;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}