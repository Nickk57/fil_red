
<div class="container">
    <h1>Ajoute une sous-category</h1>
</div><br>
<div class="container">
    <form method="POST" action="#">
        <div class="form">
            <label for="exampleFormControlInput1">Nom :</label><br>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" required>
        </div><br>
        <div class="form">
            <label for="formFile" class="form-label">photos :</label><br>
            <input type="text" name="namePicture" class="form-control"><br>
            <input type="file" name="chemin" value="photo" id="formFile" class="form-control">
        </div><br>
        <div class="form">
            <input type="submit" value="Enregistre la sous-categorie" class="btn btn-success"/>
        </div>
    </form>
</div>