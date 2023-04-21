<?php ob_start() ?>
<div class="container"><br>
    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
        <button role="button" class="btn btn-success" name=""><a href="index.php?page=4" class="text-light">Ajout d'une sous-categorie</a></button>
    </div>
    <h2>Gestion des sous-categorie :</h2>
    <table class="table table-bordered">
        <head>
            <tr>
                <th>Nom</th>
                <th class="text-center">Modifie</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </head>
        <div class="container">
            <tbody>
                <?php foreach($gest_subcategory as $subCateg) { ?>
                <tr>
                    <td>
                        <?= $subCateg['name'] ?>
                    </td>
                    <td class="text-center col-2">
                        <a href="index.php?page=18&id=<?=$subCateg['id']?>">
                            <i class="fa fa-gear fa-2x" title="Modifier" style="color: orange;">
                                <img src="images/roue de param.png" class="img1">
                            </i>
                        </a>
                    </td>
                    <td class="text-center col-2">
                        <a href="index.php?page=6&id=<?=$subCateg['id']?>" onclick="return(confirm('Voulez-vous supprimer cette category ?'))">
                            <i class="fa fa-close fa-2x" title="Supprimer" style="color: red;">
                                <img src="images/Red_x.svg.png" class="img1">
                            </i>
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </div>
    </table>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>