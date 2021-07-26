<?php

use Controller\src\Admin\Article\ArticleCarousel;

?>

<h1><b>BTS SIO du Lycée Bonaparte</b></h1>
<h2>Spécialité SLAM</h2>
<p>
    <em>
        La spécialité Solutions Logicielles et Applications Métiers (SLAM)
        forme à produire les logiciels nécessaires au fonctionnement de l’entreprise
    </em>
</p>
<hr>
<h2>Liens utiles</h2>
<ul>
    <li>Site du BTS du lycée : <a href="https://bts-sio.lyc-bonaparte.fr/">https://bts-sio.lyc-bonaparte.fr/</a></li>
    <li>Moodle de M. Gil : <a href="https://moodle.gil83.fr/">https://moodle.gil83.fr/</a></li>
    <li>Moodle de M. Roche : <a href="https://moodle.benoitroche.fr/">https://moodle.benoitroche.fr/</a></li>
</ul>
<hr>
<h2>Lexique</h2>
<div id="carouselLexique" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

        <?php
        for ($i = 0; $i < count($articles); $i++) {
            ?>
            <li data-target="#carouselLexique" data-slide-to="<?= $i ?>"
            <?php
            if ($i === 0) {
                echo 'class="active"';
            }
            ?>></li>
            <?php
        }
        ?>

    </ol>
    <div class="carousel-inner">
        <?php
        $i = 0;
        if (isset($articles)) {
            foreach ($articles as $article) {
                $i++;
                ?>
                <div class="carousel-item text-center<?php
                if ($i === 1) {
                    echo ' active';
                }
                ?>">
                    <?php
                    if (isset($article['img']) && !empty($article['img'] && ArticleCarousel::getStatusCode('/public/images/uploads/' . $article['img']) !== 404)) {
                        ?>
                        <img src="/public/images/uploads/<?= $article['img'] ?>">
                        <?php
                    } else {
                        ?>
                        <div class="emptyImg w-100"></div>
                        <img src="/public/images/no_code.png" class="align-centred position-absolute">
                        <?php
                    }
                    ?>
                    <div class="carousel-caption d-md-block">
                        <h5><b><?= strtoupper(htmlspecialchars($article['title'])) ?></b></h5>
                        <p><?= htmlspecialchars($article['desc']) ?></p>
                        <a href="/<?= strtolower(filter_var($article['title'], FILTER_SANITIZE_ENCODED)) ?>">Accéder à la page</a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselLexique" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précedent</span>
    </a>
    <a class="carousel-control-next" href="#carouselLexique" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
</div>
