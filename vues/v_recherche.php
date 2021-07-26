<?php

use Controller\src\Admin\Article\ArticleCarousel;
use SearchBar\Recherche;

require_once(__DIR__ . '/../controleurs/modules/bdd.php');
require_once(__DIR__ . '/../controleurs/src/SearchBar.php');

$recherche = new Recherche($bdd);

    $resulat = $recherche->rechecher($_GET['q']);

if (count($resulat) === 0) {
    ?>
    <div class="text-center"><h2>Aucun résulat</h2></div>
<?php } elseif (count($resulat) === 1) {
    ?>
    <div class="text-center"><h2><?= count($resulat) ?> résultat</h2></div>
<?php } else {?>
    <div class="text-center"><h2><?= count($resulat) ?> résultats</h2></div>
<?php } ?>

<div class="card-group">

<?php

foreach ($resulat as $affiche) {
    ?>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <?php
            if (ArticleCarousel::getStatusCode('/public/images/uploads/' . $affiche['image']) !== 404) {
                ?>
                <img class="card-img-top" src="/public/images/uploads/<?= $affiche['image'] ?>" alt=Image-<?= $affiche['titre'] ?> >
                <?php
            } else { ?>
                <img class="card-img-top" src="/public/images/no_code.png" >
                <?php
            }
            ?>

            <div class="card-body" >
                <h5 class="card-title" ><?= htmlspecialchars($affiche['titre'])?> </h5 >
                <p class="card-text" ><?= htmlspecialchars($affiche['phrase_intro']) ?></p>
                <a href="/article/<?= $affiche['article_id'] . '-' . $affiche['titre'] ?>" class="btn btn-primary">En savoir plus</a>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>
