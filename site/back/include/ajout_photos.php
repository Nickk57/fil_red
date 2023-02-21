
<div class="container">
    <form action="index.php?page=10" method="post" enctype="multipart/form-data">
        <div class="">
            <label for="name">Le nom de la photo</label><br>
            <input type="text" name="name">
        </div>
        <div>
            <label for="photos">Votre images</label><br>
            <input type="file" name="photos">
        </div>
        <button class="btn btn-success" type="submit">Envoyer</button>
    </form>
</div>
