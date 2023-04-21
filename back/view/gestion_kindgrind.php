<?php ob_start() ?>
<div class="container">
    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
        <buttom role="button" class="btn btn-success mt-5" name=""><a href="index.php?page=22" class="text-light">Ajout une mouture</a></buttom>
    </div>
    <h2 class="my-5">Gestion des moutures :</h2>
    <table class="table table-bordered" style="height: 50%;">
        <head>
            <tr>
                <th>Nom</th>
                <th>Photos</th>
                <th class="text-center">Modifie</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </head>
        <div class="container">
            <tbody>
                <?php foreach($gest_kindgrind as $kind) { ?>
                    <tr>
                        <td class="align-middle">
                            <?= $kind['name'] ?>
                        </td>
                        <td class="align-middle">
                        <img src="<?=$kind['path']?>" alt="<?=$kind['name']?>">
                        </td>
                        <td class="text-center col-2 align-middle">
                            <a href="index.php?page=24&id=<?=$kind['id']?>"><i class="fa fa-gaer fa-2x" title="Modifier" style="color: orange;"><img src="images/roue de param.png" class="img1"></i></a>
                        </td>
                        <td class="text-center col-2 align-middle">
                            <a href="index.php?page=25&id=<?=$kind['id']?>" onclick="return(confirm('Voulez-vous supprimer cette category ?'))"><i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png" class="img1"></i></a>
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