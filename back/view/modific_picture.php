<?php ob_start() ?>
<div class="conatiner">
    <h1>Modification des photos</h1>
    <form>
        <table>
            <tr>
                <td><label for="exampleInputNom1" class="form-label">Nom</label></td>
                <td><input type="text" value="<?= $categ['name'] ?>" name="name" class="form-control" id="exampleInputNom1" aria-describedby="Nom"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn btn-success" type="submit" name="submit">Valides</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php $content = ob_get_clean() ?>
<?php include('layout.php') ?>