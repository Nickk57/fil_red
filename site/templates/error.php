<?php
    ob_start();?>
    <h1>liste erreur</h1>
    <p>une erreur est survenue : <?= $errorMessage ?></p>
    <?php $content = ob_get_clean();?>
<?php require('layout.php');