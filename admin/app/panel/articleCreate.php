<?php

use Controller\src\Admin as Admin;

require_once(__DIR__ . '/../../../controleurs/src/AdminPathManager.php');
require_once(__DIR__ . '/../../../controleurs/src/CreationDef.php');

$meta['title'] = 'Panel admin - Ajout d\'un article';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];

$currentPagePath   = Admin\Path\AdminPathManager::getCurrentPagePath();
$currentConfigPage = Admin\Path\AdminPathManager::getCurrentPageConfig($admin_pages);

try {
    $creation = new Admin\Article\CreationDef($bdd);
    if (isset($_POST['titre']) && isset($_POST['contenue']) && isset($_POST['intro']) && isset($_FILES['image']) && !empty($_POST['titre'] && $_POST['contenue'] && $_POST['intro']) && $_FILES['image']) {
        $success = $creation->insertArticle(($_POST['titre']), ($_POST['contenue']), ($_POST['intro']), ($_FILES['image']));
        if ($success) {
            $result = '<div class="alert alert-success mt-4" role="alert">
                    Article mis en ligne. </div>';
        } else {
            $result = '<div class="alert alert-danger mt-4" role="alert">
                    Echec l\'article n\'est pas en ligne. </div>';
        }
    }
} catch (Exception $ex) {
    $error = $ex->getMessage();
}


$loadContentName = 'v_creation.php';

require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
