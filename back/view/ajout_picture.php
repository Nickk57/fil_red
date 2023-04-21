<?php ob_start() ?>
<div class="container">
    <br><h1>Ajout une photo :</h1><br>
    <h3><?= $success ?></h3>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form">
            <label for="exampleFormControlInput1">Le nom de la photo</label><br>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form">
            <label for="exampleFormControlInput1">Le nom de la mouture</label><br>
            <input type="text" name="nameGrind" class="form-control" id="exampleFormControlInput1">
        </div><br>
        <div class="form">
            <label for="formFile" class="form-label">Votre images</label><br>
            <input type="file" name="picture" class="form-control" id="formFile">
        </div><br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type="submit" name="submit">Envoyer</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>