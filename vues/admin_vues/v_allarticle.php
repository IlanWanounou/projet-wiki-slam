<?php

use Controller\src\Admin\Article\EditArticle;

require_once(__DIR__ . '/../../controleurs/modules/bdd.php');
require_once(__DIR__ . '/../../controleurs/src/EditArticle.php');

$editArticle = new EditArticle($bdd);
$titreArticle = $editArticle->selectArticle($bdd);

if (isset($result)) {
    echo ($result);
}
?>

<table class="table table-hover">
    <h2 class="text-center pb-2">Gestion article</h2>

    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Article</th>
            <th scope="col">Editer</th>
            <th scope="col">Mise en sommeil / Activer</th>
            <th scope="col">Suppression définitive</th>
            <th scope="col">Etat</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($titreArticle as $titre) {
                ?>
                <th><?= $titre['article_id'] ?></th>
                <td><?= htmlspecialchars($titre['titre']) ?></td>
                <td><a href="/admin/articles/edit/<?= $titre['article_id'] ?> ">Editer</a></td>
                <?php
                if (!$titre['deleted_at']) {
                    ?>
                    <td><a href="?sommeil=<?= $titre['article_id'] ?>"  class="btn btn-primary btn-sm" type="button">Mettre hors ligne</a></td>
                    <td><a href="?suppression=<?= $titre['article_id'] ?>" class="btn btn-danger btn-sm" type="button">Supprimer</a></td>
                    <td><span class="badge badge-success ">En ligne</span></td>
                    <?php
                } else {
                    ?>
                    <td><a href="?sommeil=<?= $titre['article_id'] ?>"  class="btn btn-primary btn-sm" type="button">Mettre en ligne</a></td>
                    <td><a href="?suppression=<?= $titre['article_id'] ?>" class="btn btn-danger btn-sm" type="button">Supprimer</a></td>
                    <td> <span class="badge badge-danger">Hors ligne</span></td>
                    <?php
                }
            }
            ?>
        </tr>
    </tbody>
</table>

