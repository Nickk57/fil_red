<?php ob_start() ?>
<br>
<div class="conatiner">
    <h1>Modification des produits</h1>
</div><br>
<div class="conatiner">
    <form method="post">
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Nom</label>
            <input type="text" value="<?= $selProduct['name'] ?>" name="name" 
            class="form-control" id="exampleInputNom1" aria-describedby="Nom">
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Prix</label>
            <input type="number" value="<?= $selProduct['price']?>" name="prix" 
            class="form-control" id="exampleInputNom1" aria-describedby="Nom">
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Description</label>
            <input type="text" value="<?=$selProduct['description']?>" name="description"
            class="form-control" id="exampleInputNom1" aria-describedby="Nom">
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">composition de l'assenblage</label>
            <input type="text" value="<?=$selProduct['composition']?>" name="composition"
            class="form-control" id="exampleInputNom1" aria-describedby="">
        </div><br>
        <div class="form">
            <label for="exampleTextareaNom1" class="form-label">du café qui provinet de vrais gens</label>
            <textarea type="text" value="<?=$selProduct['come_from']?>" id="exampleTextareaNom1"><?=$selProduct['come_from']?></textarea>
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Meilleur torréfacteur d'europe 2019</label>
            <textarea value="<?=$selProduct['coffee']?>" id="exampleInputNom1"><?=$selProduct['coffee']?></textarea>
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">Fraîchement torréfié</label>
            <textarea value="<?=$selProduct['roast']?>" id="exampleInputNom1"><?=$selProduct['roast']?></textarea>
        </div><br>
        <div class="form">
            <label for="exampleInputNom1" class="form-label">aider à la régénération des forêts</label>
            <textarea value="<?=$selProduct['forest']?>" id="exampleInputNom1"><?=$selProduct['forest']?></textarea>
        </div><br>
        <div>
            <p>Sélectionnez la mouture :</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="<?=$selProduct['weight']?>" name="grain" id="flexRadioDefault1">
                <label class="form-chack-label" for="flexRadioDefault1">Grain</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="<?=$selProduct['weight']?>" name="piston" id="flexRadioDefault2">
                <label class="form-chack-label" for="flexRadioDefault2">Piston</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="<?=$selProduct['weight']?>" name="filtre" id="flexRadioDefault3">
                <label class="form-chack-label" for="flexRadioDefault3">Filtre</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="<?=$selProduct['weight']?>" name="italienne" id="flexRadioDefault4">
                <label class="form-chack-label" for="flexRadioDefault4">Italienne</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="<?=$selProduct['weight']?>" name="espresso" id="flexRadioDefault5">
                <label class="form-chack-label" for="flexRadioDefault5">Espresso</label>
            </div>
        </div><br>
        <div class="form d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type="submit" name="submit">Valides</button>
        </div>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php')?>