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
            <label for="exampleFormControlSelect1" class="form-label">sous-categorie :</label><br>
            <select class="col-3 text1" name="id_subcategory" id="id_subcategory">
                <?php foreach($subCategory as $subcate){?>
                    <option value="<?=$subcate['id']?>"><?=$subcate['name']?></option>
                <?php } ?>
            </select>
        </div><br>
        <div class="form">
            <label for="exampleFormControlSelect1" class="form-label">la region :</label><br>
            <select class="col-3 text1" name="region" id="region">
                <?php foreach($sel_region as $region){?>
                    <option value="<?=$region['id']?>"><?=$region['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Description :</label><br>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
        </div><br>
        <div class="form">
            <label for="exampleFormControlInput1" class="form-label">Caractère</label>
            <input class="form-control" id="exampleFormControlInput1" name="character">
        </div><br>
        <div class="form">
            <label for="exampleFormControlInput1" class="form-label">Saveurs</label>
            <input class="form-control" id="exampleFormControlInput1" name="flavour">
        </div><br>
        <div class="from">
            <label for="exampleFormControlSelect1" class="form-label">Règion :</label><br>
            <select class="col-3 text1" name="weight" id="weight">
                <?php foreach($id_weight as $weight){?>
                    <option value="<?=$weight['id']?>"><?=$weight['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form">
            <label for="exampleFormControlTextarea1" class="form-label">Coopérative féminine</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="cooperative"></textarea>
        </div><br>
        <div>
            <label for="exampleFormControlIpnut1">Le nom de la photo</label>
            <input type="text" name="namePicture" class="form-control" id="exampleFromControlInput1">
        </div><br>
        <div>
            <label for="exampleFormControlInput1">Photos</label>
            <input type="file" name="picture" class="form-control" id="formFile">
        </div><br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-success" name="submit">Enregistre le produit</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>