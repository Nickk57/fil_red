<?php ob_start() ?>
<div class="container mt-5">
    <h1>Ajoute des poids</h1>
    <h3><?= $success ?></h3>
</div><br>
<div class="container">
    <form method="post">
        <div class="form">
            <label for="exampleFormControlInput1">Nom d'un poid :</label><br>
            <input class="form-control" type="text" name="name" id="exampleFormControlInput1">
        </div><br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success" name="submit">Enregistre le poid</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>