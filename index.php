<?php
session_start();

$meta['title'] = 'Lexique - BTS SIO SLAM';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'pages.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/controleurs/session.php');
require_once(__DIR__ . '/controleurs/bdd.php');
require_once(__DIR__ . '/controleurs/articleCarousel.php');
require_once(__DIR__ . '/vues/v_header.php');
?>
<body>
    <div class='container'>
        <header>
            <?php
            $page = null;
            require_once(__DIR__ . '/vues/v_nav.php');
            ?>
        </header>
        <div id="content" class="bg-light p-3">
            <?php
            $articleCarousel = new Article\ArticleCarousel($bdd);
            $articles = $articleCarousel->getAllArticles();
            require_once(__DIR__ . '/vues/v_index.php');
            ?>
        </div>
    </div>
    <?php
    require_once(__DIR__ . '/vues/v_footer.php');
    ?>
</body>
