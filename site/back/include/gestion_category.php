<div class="container">
    <div class="table table-dark">
        <div class="container">
            <?php
            $onclick = 'onclick="return(confirm("Voulez-vous supprimer ces category ?"))';
            $query = "SELECT * FROM category WHERE nom";
            $req = dbConnect()->prepare($query);
            $req->bindValue(':id', '', PDO::PARAM_INT);
            $req->execute();
            
            while($do = $req->fetch()) {
                echo '
                    <tr>
                        <td>
                            '.$do['nom'].'
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