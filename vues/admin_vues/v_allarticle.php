<?php
require_once(__DIR__ . '/../../controleurs/bdd.php');
require_once(__DIR__ . '/../../controleurs/editArticle.php');

$editArticle = new Article\editArticle($bdd);
$titreArticle = $editArticle->selectArticle($bdd);
?>

<h1>Edition des articles (en ligne)</h1>
<div>
    <ul class="list-unstyled">
        <?php
        foreach ($titreArticle as $titre) {
            ?>
            <li>
                <a href="/admin/articles/edit/<?=$titre['article_id'] ?> "><?= htmlspecialchars($titre['titre']) ?></a>
            </li>
        <?php } ?>
    </ul>
</div>
