<?php $title = "Site de café"; ?>
<?php ob_start(); ?>
<h1>Site de café !</h1>
<p><a href="index.php">Retour à la page d'accueil</a></p>
<div class="">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>Le <?= $post['french_creation_date'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2></h2>
<?php ob_get_clean();
    require('layout.php')?>