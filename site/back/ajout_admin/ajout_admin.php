<?php
    include_once("../model/model.php");
    dbConnect();
    ajoutAdmin();
    
    // $mdp=password_hash("admin", PASSWORD_DEFAULT);
    // echo $mdp;

    
    // echo $mdp;

    $msg="";
    // if (isset($_POST['submit'])) {
    //     if (!isset($_POST['email']) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    //     || (!isset($_POST['mdp']) || empty($_POST['mdp'])) 
    //     || (!isset($_POST['nom']) || empty($_POST['nom'])) 
    //     || (!isset($_POST['prenom']) || empty($_POST['prenom']))) {
    //         echo 'Il faut remplir tous les champs pour soumettre le formulaire.';
    //         exit;
    //     }
    //     else {
    //         $email = $_POST['email'];
    //         $mdp = $_POST['mdp'];
    //         $prenom = strip_tags($_POST['prenom']);
    //         $nom = strip_tags($_POST['nom']);

    //         $query = ;
    //         $req = $db->prepare($query);
    //         $req->bindValue(':email', $email, PDO::PARAM_STR);
    //         $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    //         $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    //         $req->bindValue(':mdp', password_hash($mdp, PASSWORD_DEFAULT), PDO::PARAM_STR);
    //         $req->execute();
    //         $msg="Votre inscription a bien été enregistrée.";
    //     }
    // }

    
?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
<body>
    <div class="container-md text-center">
        <h3><?=$msg?></h3>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>ajout d'admin</h2>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputNom1" class="form-label">Votre Nom</label>
                <input type="text" name="name" class="form-control" id="exampleInputNom1" aria-describedby="Nom">
                <div id="Nom" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputprenom1" class="form-label">Votre prenom</label>
                <input type="text" name="first_name" class="form-control" id="exampleInputPrenom1" aria-describedby="prenom">
                <div id="prenom" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Inscription</button>
        </form>
    </div>
</body>