<br><br>
<div class="container">
    <h1>Ajoutie un product</h1>
</div><br>
<div class="container">
    <form method="post" action="index.php?page=" enctype="multipart/form-data">
        <div class="form">
            <label for="exampleFormControlInput1">Nom :</label>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" required>
        </div>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Description :</label><br>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">€</span>
            <input class="form-control" type="number" placeholder="Prix" aria-label="Prix" aria-describedby="basic-addon1">
          </div>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Characteristic :</label><br>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div><br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <input type="submit" role="button" class="btn btn-success me-md-2">
        </div>
    </form>
</div>