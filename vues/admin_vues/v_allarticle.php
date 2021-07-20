<?php
require_once(__DIR__ . '/../../controleurs/bdd.php');
require_once(__DIR__ . '/../../controleurs/editArticle.php');

$editArticle = new Article\editArticle($bdd);
$titreArticle = $editArticle->selectArticle($bdd);


?>

<div class="table-responsive">

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Article</th>
            <th scope="col">Editer</th>
            <th scope="col">Mise en sommeil / Activer</th>
            <th scope="col">Etat</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($titreArticle as $titre) {
        ?>
        <tr>
            <th><?= $titre['article_id'] ?></th>
            <td><?= htmlspecialchars($titre['titre']) ?></td>
            <td><a href="/admin/articles/edit/<?= $titre['article_id'] ?> ">Editer</a></td>
            <?php if (!$titre['deleted_at']) { ?>
                <td><a href="?sommeil=<?= $titre['article_id'] ?>"  type="button">Mettre hors ligne</a></td>
                <td><span class="badge badge-success ">En ligne</span></td>
            <?php } else { ?>
                <td><a href="?sommeil=<?= $titre['article_id'] ?>"  type="button">Mettre en ligne</a></td>

            <td> <span class="badge badge-danger">Hors ligne</span></td>
            <?php }?>
        </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

