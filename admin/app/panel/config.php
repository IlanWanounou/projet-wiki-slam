<?php

$meta['title'] = 'Ajouter une page';
$meta['css']   = ['admin.css'];
$meta['js']    = ['admin.js'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/configManager.php');
require_once(__DIR__ . '/../../../controleurs/maintenance_mod.php');

use Services\Admin\Manager\AdminManager as AdminManager;

$currentPagePath   = AdminManager::getCurrentPagePath();
$currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
$loadContentName   = 'v_admin_configuration.php';

$maintenance = new Maintenance\Maintenance($bdd);
if (isset($_SESSION['token'], $_GET['t']) && $_SESSION['token'] == $_GET['t']) {
    $success = 'Les modifications ont bien été effectuées';
    $_SESSION['token'] = null;
} elseif (isset($_FILES['uploadFavicon'])) {
    try {
        Services\Admin\Manager\ConfigManager::uploadFavicon($_FILES['uploadFavicon']);
        // Détruit les surcharges serveurs avec le refresh button
        $token = bin2hex(random_bytes(50));
        $_SESSION['token'] = $token;
        header ('Location: ' . '?t=' . $token);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
} elseif (isset($_POST['maintenance'])) {
    if ($maintenance->isMaintenance()) {
        $maintenance->setMaintenance(false);
    } else {
        $maintenance->setMaintenance(true);
    }
    sleep(1);
} elseif (isset($_POST['footer-content-1'], $_POST['footer-content-2'])) {
    $footer = array($_POST['footer-content-1'], $_POST['footer-content-2']);
    Services\Admin\Manager\ConfigManager::setFooter($bdd, $footer);
    header('Location: #');
}
$contentCss    = Services\Admin\Manager\ConfigManager::getCss($bdd);
$contentFooter = Services\Admin\Manager\ConfigManager::getFooter($bdd);
require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
