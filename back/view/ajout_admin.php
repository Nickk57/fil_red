<?php ob_start() ?>
<body>
    <div class="container-md text-center">
        <h3></h3>
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
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>