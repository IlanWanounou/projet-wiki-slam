<?php

$meta['title'] = 'Ajouter une page';
$meta['css'] = ['admin.css'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath   = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$loadContentName   = 'v_admin_configuration.php';
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
