<?php

$meta['title'] = 'Configuration du site';
$meta['css']   = ['admin.css'];
$meta['js']    = ['admin.js'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/maintenance_mod.php');

use Manager\LogManager;
use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$logManager = new LogManager();

$loadContentName = 'v_admin_index.php';
$username = $_SESSION['username'];
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
