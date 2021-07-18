<?php
$meta['title'] = 'Panel admin - Liste de tout les article   ';
$meta['css'] = ['admin.css'];
$meta['js'] = ['index.js'];
require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath   = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);




$loadContentName   = 'v_allarticle.php';

require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
