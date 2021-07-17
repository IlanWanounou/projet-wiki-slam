<?php

$meta['title'] = 'Panel admin - Lexique BTS SIO SLAM';
$meta['css'] = ['admin.css'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath   = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$loadContentName   = '';

require_once(__DIR__ . '/../../../vues/v_admin_skeleton.php');

