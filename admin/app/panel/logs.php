<?php

use Controller\src\Admin\Config\LogManager;
use Controller\src\Admin\Path\AdminPathManager;

require_once(__DIR__ . '/../../../controleurs/modules/logs.php');
require_once(__DIR__ . '/../../../controleurs/src/AdminPathManager.php');
require_once(__DIR__ . '/../../../controleurs/modules/maintenance.php');

$meta['title'] = 'Page logs';
$meta['css']   = ['admin.css'];
$meta['js']    = ['logs.js'];

$currentPagePath   = AdminPathManager::getCurrentPagePath();
$currentConfigPage = AdminPathManager::getCurrentPageConfig($admin_pages);
$logManager        = new LogManager();

$dates = $logManager->getAllDates();
$loadContentName = 'v_admin_logs.php';

require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
