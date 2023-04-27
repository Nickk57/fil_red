<?php ob_start() ?>
<div class="container"><br>
    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
        <buttom role="button" class="btn btn-success" name=""><a href="index.php?page=7" class="text-light">Ajout d'un produit</a></buttom>
    </div>
    <h1>Gestion des produit :</h1>
    <table class="table table-bordered">
        <head>
            <tr>
                <th>Nom</th>
                <th>Photos</th>
                <th>Prix</th>
                <th>Description</th>
                <th>Option</th>
                <th>Coopérative</th>
                <th class="text-center">Modifie</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </head>
        <div class="container">
            <tbody>
                <?php foreach($gest_product as $product) { ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td>
                            <?php foreach(getPicturesByIdProduct($product['id']) as $pict) {?>
                                <img src="<?=$pict['path']?>" class="images1">
                            <?php } ?>
                        </td>
                        <td>
                            <?= $product['price']?>
                        </td>
                        <td>
                            <?= $product['description']?>
                        </td>
                        <td>
                            <ul>
                                <li><?=$product['characte']?></li>
                                <li><?=$product['flavour']?></li>
                            </ul>
                        </td>
                        <td>
                            <?=$product['cooperative']?>
                        </td>
                        <td class="text-center col-1">
                            <a href="index.php?page=17&id=<?=$product['id']?>"><i class="fa fa-gaer fa-2x" title="Modifier" style="color: orange;"><img src="images/roue de param.png" class="img1"></i></a>
                        </td>
                        <td class="text-center col-1">
                            <a href="index.php?page=9&id=<?=$product['id']?>" onclick="return(confirm('Voulez-vous supprimer cette category ?'))"><i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png" class="img1"></i></a>
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