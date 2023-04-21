<?php ob_start() ?>
<br><br>
<div class="container">
    <h1>Ajoute un product</h1>
    <h3><?= $success ?></h3>
</div><br>
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="form">
            <label for="exampleFormControlInput1">Nom :</label>
            <input type="text" name="name" id="exampleFormControlInput1" class="form-control" required>
        </div><br>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">€</span>
            <input class="form-control" type="text" name="prix" placeholder="Prix" aria-label="Prix" aria-describedby="basic-addon1">
        </div><br>
        <div class="form">
            <select class="col-3 text1" name="id_subcategory" id="id_subcategory">
                <?php foreach($subCategory as $subcate){?>
                    <option value="<?=$subcate['id']?>"><?=$subcate['name']?></option>
                <?php } ?>
            </select>
        </div><br>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Description :</label><br>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
        </div><br>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">composition de l'assenblage</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="compostion"
            aria-describedby=""></textarea>
        </div><br>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">du café qui provient de vrais gens</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="come_from"></textarea>
        </div><br>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Meilleur torréfacteur d'europe 2019</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="coffee"></textarea>
        </div><br>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Fraîchement torréfié</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="roast"></textarea>
        </div><br>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Aider à la régénération des forêts</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="forest"></textarea>
        </div><br>
        <div>
            <label for="exampleFormControlIpnut1">Le nom de la photo</label>
            <input type="text" name="namePicture" class="form-control" id="exampleFromControlInput1">
        </div><br>
        <div>
            <label for="exampleFormControlInput1">Photos</label>
            <input type="file" name="picture" class="form-control" id="formFile">
        </div><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="250G" name="weight">
            <label class="form-check-label" for="inlineCheckbox1">250G</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="500G" name="weight">
            <label class="form-check-label" for="inlineCheckbox2">500G</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1Kg" name="weight">
            <label class="form-check-label" for="inlineCheckbox3">1Kg</label>
        </div>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success" name="submit">Enregistre le produit</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>