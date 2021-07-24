<?php

require_once(__DIR__ . '/../../../controleurs/logs_mod.php');

$meta['title'] = 'Page logs';
$meta['css']   = ['admin.css'];
$meta['js']    = ['logs.js'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/maintenance_mod.php');

use Manager\LogManager;
use Services\Admin\Manager\AdminManager as AdminManager;
$currentPagePath = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$logManager = new LogManager;
$dates = $logManager->getAllDates();

$loadContentName = 'v_admin_logs.php';
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
