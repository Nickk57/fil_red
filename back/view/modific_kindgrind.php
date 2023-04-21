<?php ob_start() ?>
<br>
<div class="container">
    <h1>Modification des mouture</h1>
</div><br>
<div class="container">
    <form method="post">
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Nom</label>
            <input type="text" value="<?=$selKindgrind['name']?>" name="name" class="form-control" id="exampleInputNom1" aria-describedby="Nom">
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Images</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Images</option>
                <?php foreach($gest_picture as $picture) { ?>
                    <option value="<?=$picture['name']?>"><?=$picture['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type="submit" name="submit">Valides</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>