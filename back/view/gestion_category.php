<?php ob_start() ?>
<div class="container"><br>
    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
        <buttom role="button" class="btn btn-success" name=""><a href="index.php?page=1" class="text-light">Ajout une categorie</a></buttom>
    </div>
    <h2>Gestion des categorie :</h2>
    <table class="table table-striped">
        <head>
            <tr>
                <th>Nom</th>
                <th class="text-center">Modifie</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </head>
        <div class="container">
            <tbody>
                <?php foreach($gest_category as $categ) {?>
                <tr>
                    <td>
                        <?= $categ['name'] ?>
                    </td>
                    <td class="text-center col-2">
                        <a href="index.php?page=15&id=<?=$categ['id']?>"><i class="fa fa-gaer fa-2x" title="Modifier" style="color: orange;"><img src="images/roue de param.png" class="img1"></i></a>
                    </td>
                    <td class="text-center col-2">
                        <a href="index.php?page=3&id=<?=$categ['id']?>" onclick="return(confirm('Voulez-vous supprimer cette category ?'))"><i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png" class="img1"></i></a>
                    </td><br>
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