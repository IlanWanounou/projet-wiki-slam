<?php
$meta['title'] = 'Panel admin - Liste de toutes les images';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];

require_once(__DIR__ . '/../../../controleurs/bdd.php');
require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/articleManager.php');
require_once(__DIR__ . '/../../../controleurs/articleCarousel.php');
require_once(__DIR__ . '/../../../controleurs/gestionImage.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$articleManager = new Article\ArticleManager($bdd);
$gestionImage = new gestion\GestionImage();
$folder = '../vues/images/uploads/';
$isEmpty = $gestionImage->isFolderEmpty($folder);

$taileActuel = $gestionImage->getSizeFolder($folder); // En KO
$taileMax = DIRECTORY_IMAGE_MAXSIZE; // En KO

$allImages = (scandir($folder));
if(isset($_GET['deleteAll'])) {
    $gestionImage->deleteAllImage($folder);
    header('Location: /admin/images');
}
if (isset($_GET['delete'])) {
    $gestionImage->deleteImage($folder.$_GET['delete']);
    header('Location: /admin/images');

}



$loadContentName = 'v_admin_image.php';
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
