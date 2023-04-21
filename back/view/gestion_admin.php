<?php ob_start() ?>
<div class="container"><br>
    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
        <buttom role="button" class="btn btn-success" name=""><a href="index.php?page=13" class="text-light">Ajout d'admin</a></buttom>
    </div>
    <h2>Gestion des admin :</h2>
    <table class="table table-bordered">
        <head>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th class="text-center">Supprimer</th>
            </tr>
        </head>
        <div class="container">
            <tbody>
                <?php foreach($gest_admin as $admin) {?>
                <tr>
                    <td>
                        <?= $admin['name'] ?>
                    </td>
                    <td>
                        <?= $admin['first_name'] ?>
                    </td>
                    <td>
                        <?= $admin['email'] ?>
                    </td>
                    <td class="text-center col-2">
                        <a href="index.php?page=&id=<?=$admin['id']?>" onclick="return(confirm('Voulez-vous supprimer cette category ?'))">
                        <i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png" class="img1"></i></a>
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