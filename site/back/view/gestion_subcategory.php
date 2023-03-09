<div class="container">
    <div class="table table-dark">
        <div class="container">
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <buttom role="button" class="btn btn-success" name=""><a href="index.php?page=4" class="text-light">Ajout une categorie</a></buttom>
            </div>
            <?php
            $onclick = 'onclick="return(confirm("Voulez-vous supprimer ces category ?"))';
            $query = "SELECT * FROM sub_category";
            $req = dbConnect()->prepare($query);
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':id_category', $id_category, PDO::PARAM_INT);
            $req->bindValue(':id_photo',$id_photo, PDO::PARAM_INT);
            $req->execute();
            
            while($do = $req->fetch()) {
                echo '
                    <tr>
                        <td>
                            '.$do['nom'].'
                        </td>
                        <td>
                            '.$do['id_caterory'].'
                        </td>
                        <td>
                            '.$do['id_photo'].'
                        </td>
                        <td class="action">
                            <a href="index.php?page=13&id='.$do['id'].'"><i class="fa fa-gaer fa-2x" title="Modifier" style="color: orange;"><img src="images/roue de param.png"></i></a>
                        </td>
                        <td class="action">
                            <a href="index.php?page=3&id='.$do['id'].'" onclick="return(confirm(\'Voulez-vous supprimer cette category ?\'));"><i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png"></i></a>
                        </td>
                    </tr>';
            }
            ?>
        </div>
    </div>
</div>