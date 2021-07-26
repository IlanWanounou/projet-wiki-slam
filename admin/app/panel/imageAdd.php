<?php
$meta['title'] = 'Panel admin - Liste de tout les articles';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js', 'admin.js'];

use Controller\src\Admin\Article\ArticleManager;
use Controller\src\Admin\Path\AdminPathManager;

require_once(__DIR__ . '/../../../controleurs/modules/bdd.php');
require_once(__DIR__ . '/../../../modele/admin_pages_config.php');
require_once(__DIR__ . '/../../../controleurs/src/AdminPathManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ArticleManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ArticleCarousel.php');


$currentPagePath = AdminPathManager::getCurrentPagePath();
$currentConfigPage = AdminPathManager::getCurrentPageConfig($admin_pages);
$articleManager = new ArticleManager($bdd);


$loadContentName = 'v_admin_addimage.php';
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
