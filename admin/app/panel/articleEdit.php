<?php
$meta['title'] = 'Panel admin - Liste de tout les articles';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];

require_once(__DIR__ . '/../../../controleurs/bdd.php');
require_once(__DIR__ . '/../../../controleurs/editArticle.php');
require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/articleManager.php');
require_once(__DIR__ . '/../../../controleurs/articleCarousel.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$articleManager = new Article\ArticleManager($bdd);
$editArticle = new Article\editArticle($bdd);




try {
    if(isset($_POST['titre']) &&  isset($_POST['contenue']) && isset($_POST['intro']) && isset($_FILES['image']) && !empty($_POST['titre'] && $_POST['contenue'] &&  $_POST['intro'])  && $_FILES['image']) {
        $success = $editArticle->articleUpdate(($_GET['article']), ($_POST['titre']), ($_POST['contenue']), ($_POST['intro']), ($_FILES['image']));
        if ($success) {
            $result = '<div class="alert alert-success mt-4" role="alert">
                    L\'article a été modifié. </div>';
        } else {
            $result = '<div class="alert alert-danger mt-4" role="alert">
                 Échec l\'article n\'a pas pu être modifié. </div>';
        }
    }
}catch (Exception $e) {
    echo $e;
}

if (isset($_GET['article']) && $articleManager->articleExists($_GET['article'])) {
    $meta['title'] = 'Edition de l\'article ' . $_GET['article'];
    $loadContentName  = 'v_edit.php';
    $allContent = $editArticle->selectAllById($_GET['article']);
    require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');

} else if(isset($_GET['sommeil'])) {
    $editArticle->OnOfflineArticle($_GET['sommeil']);
    header('Location: /admin/articles/edit');

} else if(isset($_GET['suppression'])) {
    $editArticle->articleDelete($_GET['suppression']);
    $token = bin2hex(random_bytes(50));
    $_SESSION['token'] = $token;
    header('Location: ' . '?t=' . $token);
}
else if (isset($_SESSION['token'], $_GET['t']) && $_SESSION['token'] == $_GET['t']) {
    $success = true;
    if ($success) {
        $result = '<div class="text-center alert alert-danger mt-4" role="alert">
                   L\'article a été supprimé. </div>';
    } else {
        $result = '<div class="text-center alert alert-danger mt-4" role="alert">
                 Échec l\'article n\'a pas pu être supprimé. </div>';
    }

}

    $titreArticle = $editArticle->selectArticle($bdd);
    $loadContentName = 'v_allarticle.php';
    require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
