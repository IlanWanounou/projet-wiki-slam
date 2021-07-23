<?php
session_start();
require_once(__DIR__ . '/controleurs/session.php');
require_once(__DIR__ . '/controleurs/bdd.php');
require_once(__DIR__ . '/controleurs/maintenance_mod.php');
require_once(__DIR__ . '/controleurs/articleCarousel.php');
require_once(__DIR__ . '/controleurs/articleManager.php');


   if (isset($_GET['articleName'], $_GET['articleId']) && !empty($_GET['articleName']) && !empty($_GET['articleId'])) {
    $articleManager = new Article\ArticleManager($bdd);
    if (!$articleManager->articleExists($_GET['articleId'])) {
        http_response_code(404);
        require_once(__DIR__ . '/controleurs/page_erreur/404.php');
        die();
    } else {
        $meta['title'] = $articleManager->getName($_GET['articleId']) . ' - BTS SIO SLAM';
        $parseArticleId = $_GET['articleId'];
        $vue = 'v_article.php';
    }
    } else if (isset($_GET['q']) && !empty($_GET['q'])){
       $meta['title'] = 'Recherche - '. $_GET['q'];
       $vue =  'v_recherche.php';


   } else {

    $meta['title'] = 'Lexique - BTS SIO SLAM';
    $articleCarousel = new Article\ArticleCarousel($bdd);
    $articles = $articleCarousel->getAllArticles();
    $vue = 'v_index.php';
}

$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'pages.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];

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
            require_once(__DIR__ . '/vues/' . $vue);
            ?>
        </div>
    </div>
    <?php
    require_once(__DIR__ . '/vues/v_footer.php');
    ?>
</body>

