<?php
$meta['title'] = 'Panel admin - Liste de toutes les images';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];

use Controller\src\Admin as Admin;
use Controller\src\Admin\Article\ArticleManager;
use Controller\src\Admin\Article\EditArticle;
use Controller\src\Admin\Path\AdminPathManager;

require_once(__DIR__ . '/../../../controleurs/modules/bdd.php');
require_once(__DIR__ . '/../../../modele/admin_pages_config.php');
require_once(__DIR__ . '/../../../controleurs/src/AdminPathManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ArticleManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ArticleCarousel.php');
require_once(__DIR__ . '/../../../controleurs/src/gestionImage.php');
require_once(__DIR__ . '/../../../controleurs/src/CreationDef.php');



$currentPagePath = AdminPathManager::getCurrentPagePath();
$currentConfigPage = AdminPathManager::getCurrentPageConfig($admin_pages);
$articleManager = new ArticleManager($bdd);
$gestionImage = new gestion\GestionImage();
$upload = new Admin\Article\CreationDef($bdd);
$folder = '../vues/images/uploads/';
$isEmpty = $gestionImage->isFolderEmpty($folder);

$taileActuel = $gestionImage->getSizeFolder($folder); // En KO
$taileMax = DIRECTORY_IMAGE_MAXSIZE; // En KO

$allImages = (scandir($folder));
if (isset($_GET['deleteAll'])) {
    $gestionImage->deleteAllImage($folder);
    header('Location: /admin/images');
}
if (isset($_GET['delete'])) {
    $gestionImage->deleteImage($folder . $_GET['delete']);
    header('Location: /admin/images');
}

if (isset($_FILES['image']) && !empty($_FILES['image'])) {
    $success = $upload->uploadImage($_FILES['image']);
    if ($success) {
        header( 'Location:  /admin/images?success=1');
    } else {
        header( 'Location:  /admin/images?success=2' );
    }
}

if (isset($_GET['success']) && $_GET['success'] == 1){
    $resultAdd = '<div class="alert alert-success mt-4" role="alert">
                    L\'image a été ajouter. </div>';
} else if (isset($_GET['success'])  && $_GET['success'] == 2){
    $resultAdd = '<div class="alert alert-danger mt-4" role="alert">
                    Échec l\'image n\'a pas pu être ajouter. </div>';

}
$loadContentName = 'v_admin_image.php';
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
