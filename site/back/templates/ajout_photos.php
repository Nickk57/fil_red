
<div class="container">
    <form action="index.php?page=10" method="post" enctype="multipart/form-data">
        <div class="form">
            <label for="exampleFormControlInput1">Le nom de la photo</label><br>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form">
            <label for="formFile" class="form-label">Votre images</label><br>
            <input type="file" name="photos" class="form-control" id="formFile">
        </div>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <buttom class="btn btn-success" type="submit" name="submit">Envoyer</buttom>
        </div>
    </form>
</div>
