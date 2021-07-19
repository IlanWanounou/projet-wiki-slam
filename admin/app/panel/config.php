<?php

$meta['title'] = 'Ajouter une page';
$meta['css']   = ['admin.css'];
$meta['js']    = ['admin.js'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/configManager.php');
require_once(__DIR__ . '/../../../controleurs/maintenance.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath   = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$loadContentName   = 'v_admin_configuration.php';

$maintenance = new Maintenance\Maintenance($bdd);
if (isset($_SESSION['token'], $_GET['t']) && $_SESSION['token'] == $_GET['t']) {
    $success = 'Les modifications ont bien été effectuées';
    $_SESSION['token'] = null;
}
else if (isset($_FILES['uploadFavicon'])) {
    try {
        Services\Admin\Manager\ConfigManager::uploadFavicon($_FILES['uploadFavicon']);
        // Détruit les surcharges serveurs avec le refresh button
        $token = bin2hex(random_bytes(50));
        $_SESSION['token'] = $token;
        header ('Location: ' . '?t=' . $token);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
else if (isset($_POST['maintenance'])) {
    if ($maintenance->isMaintenance()) {
        $maintenance->setMaintenance(false);
    } else {
        $maintenance->setMaintenance(true);
    }
    sleep(1);
}
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
