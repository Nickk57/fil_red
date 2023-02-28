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
        <div class="input-group">
            <label for="exampleFormControlInput1">Prix :</label><br>
            <input type="text" class="form-control" id="exampleFormControlInput1" aria-label="Euro amount (with dot and two decimal places)">
            <span class="input-group-text">€</span>
            <span class="input-group-text">0.00</span>
          </div>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Characteristic :</label><br>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>
</div>