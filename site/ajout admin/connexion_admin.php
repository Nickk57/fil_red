<?php 
    session_start();
    include('connexion.php');

    if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["verifie"]) && !empty($_POST["verifie"])) {
        $email = htmlspecialchars($_POST['email']);
        $_SESSION["email"] = $email;
        $mdp = $_POST["password"];

        $query = "SELECT * FROM admin WHERE email = :email";
        $req = $bdd->prepare($query);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $reponse = $req->fetch();
        var_dump($reponse);
        $hash = $reponse["mdp"];

        if (password_verify($mdp, $hash)) {
            header("location: index.php");
        }
        else {
            echo 'le mot de passe est invalide. ';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-md text-center">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Connectez-vous</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="verifie" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Vérifiez-moi</label>
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
</body>
</html>