<?php

$meta['title'] = 'Configuration du site';
$meta['css']   = ['admin.css'];
$meta['js']    = ['admin.js', 'chart.js'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/maintenance_mod.php');

use Manager\LogManager;
use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$logManager = new LogManager();

$firstDate = date('d/m/Y', strtotime('-14 day'));
$dateDiff = 14;
for ($i=0; $i < $dateDiff; $i++) {
    $dateRemove = -$dateDiff+1+$i;
    $datas[] = $logManager->getVisitorsCount(date('Y-m-d', strtotime("$dateRemove day")));
    if ($i === $dateDiff-1) {
        $labels[] = 'Aujourd\'hui';
    } elseif ($i === $dateDiff-2) {
        $labels[] = 'Hier';
    } else {
        $labels[] = date('d/m/Y', strtotime("$dateRemove day"));
    }
}

$loadContentName = 'v_admin_index.php';
$username = $_SESSION['username'];
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
