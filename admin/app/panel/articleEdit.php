<?php

use Controller\src\Admin\Article\ArticleManager;
use Controller\src\Admin\Article\EditArticle;
use Controller\src\Admin\Path\AdminPathManager;

require_once(__DIR__ . '/../../../controleurs/src/EditArticle.php');
require_once(__DIR__ . '/../../../controleurs/src/AdminPathManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ArticleManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ArticleCarousel.php');

$meta['title'] = 'Panel admin - Liste de tout les articles';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];

$currentPagePath = AdminPathManager::getCurrentPagePath();
$currentConfigPage = AdminPathManager::getCurrentPageConfig($admin_pages);
$articleManager = new ArticleManager($bdd);
$editArticle = new EditArticle($bdd);


try {
    if (isset($_POST['titre']) &&  isset($_POST['contenue']) && isset($_POST['intro']) && isset($_FILES['image']) && !empty($_POST['titre'] && $_POST['contenue'] &&  $_POST['intro'])  && $_FILES['image']) {
        $success = $editArticle->articleUpdate(($_GET['article']), ($_POST['titre']), ($_POST['contenue']), ($_POST['intro']), ($_FILES['image']));
        if ($success) {
            $result = '<div class="alert alert-success mt-4" role="alert">
                    L\'article a été modifié. </div>';
        } else {
            $result = '<div class="alert alert-danger mt-4" role="alert">
                    Échec l\'article n\'a pas pu être modifié. </div>';
        }
    }
} catch (Exception $e) {
    echo $e;
}

if (isset($_GET['article']) && $articleManager->articleExists($_GET['article'])) {
    $meta['title'] = 'Edition de l\'article ' . $_GET['article'];
    $loadContentName  = 'v_edit.php';
    $allContent = $editArticle->selectAllById($_GET['article']);
    require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
} elseif (isset($_GET['sommeil'])) {
    $editArticle->OnOfflineArticle($_GET['sommeil']);
    header('Location: /admin/articles/edit');
} elseif (isset($_GET['suppression'])) {
    $editArticle->articleDelete($_GET['suppression']);
    $token = bin2hex(random_bytes(50));
    $_SESSION['token'] = $token;
    header('Location: ' . '?t=' . $token);
} elseif (isset($_SESSION['token'], $_GET['t']) && $_SESSION['token'] == $_GET['t']) {
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
