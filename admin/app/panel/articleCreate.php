<?php
$meta['title'] = 'Panel admin - Ajout d\'un article';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];
require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/creation.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);


try {
    $creation = new Creation\CreationDef($bdd);
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
