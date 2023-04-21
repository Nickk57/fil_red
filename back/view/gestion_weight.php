<?php ob_start() ?>
<div class="container"><br>
    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
        <buttom role="button" class="btn btn-success" name=""><a href="index.php?page=19" class="text-light">Ajout d'un weight</a></buttom>
    </div>
    <h1>Gestion des poids :</h1>
    <table class="table table-bordered">
        <head>
            <tr>
                <th>Weight</th>
                <th class="text-center">Modifie</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </head>
        <div class="container">
            <tbody>
                <?php foreach($gest_weight as $weight) { ?>
                    <tr>
                        <td><?= $weight['name'] ?></td>
                        <td class="text-center col-2">
                            <a href="index.php?page=26&id=<?=$weight['id']?>"><i class="fa fa-gaer fa-2x" title="Modifier" style="color: orange;"><img src="images/roue de param.png" class="img1"></i></a>
                        </td>
                        <td class="text-center col-2">
                            <a href="index.php?page=21&id=<?=$weight['id']?>" onclick="return(confirm('Voulez-vous supprimer cette category ?'))"><i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png" class="img1"></i></a>
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