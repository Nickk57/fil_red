<?php
    include_once('model/sub_category.php');
    include_once('model/category.php');
    ajoutSsCategorie();
?>
<div class="container">
    <h1>Ajoute une sous-category</h1>
</div>
<div class="container">
    <form method="POST" action="#">
        <div class="form">
            <label for="nom">Nom</label>
            <input type="text" name="name" id="nom" required>
        </div>
        <div class="form">
            <label for="photos">photos</label>
            <select>
                <option>photos</option><?php
                foreach($photos as $photo){?>
                    <option value="<?=$photo['name']?>"><?=$photo['name']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form">
            <label for="categorie">categorie</label>
            <select>
                <option>categorie</option><?php
                foreach ($categorie as $category){
                    ?>
                    <option value="<?=$category['name']?>"><?=$category['name']?></option><?php
                }?>
            </select>
        </div>
        <div class="form">
            <input type="submit" value="Enregistre la sous-categorie"/>
        </div>
    </form>
</div>