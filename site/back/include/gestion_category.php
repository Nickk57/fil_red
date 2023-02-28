<div class="container">
    <table class="table">
        <div class="container">
            <?php
            $onclick = 'onclick="return(confirm("Voulez-vous supprimer ces category ?"))';
            $query = "SELECT * FROM category";
            $req = dbConnect()->prepare($query);
            $req->bindValue(':name', PDO::PARAM_STR);
            $req->execute();
            
            while($do = $req->fetch()) {
                echo '
                    <tr>
                        <td>
                            '.$do['name'].'
                        </td>
                        <td class="action">
                            <a href="index.php?page=13&id='.$do['id'].'"><i class="fa fa-gaer fa-2x" title="Modifier" style="color: orange;"><img src="images/roue de param.png" class="img1"></i></a>
                        </td>
                        <td class="action">
                            <a href="index.php?page=3&id='.$do['id'].'" onclick="return(confirm(\'Voulez-vous supprimer cette category ?\'));"><i class="fa fa-close fa-2x" title="Supprimer" style="color: red;"><img src="images/Red_x.svg.png" class="img1"></i></a>
                        </td><br>
                    </tr>'
                ;
            }
            ?>
        </div>
    </table>
</div>