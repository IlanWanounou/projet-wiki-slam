<?php

$meta['title'] = 'Configuration du site';
$meta['css']   = ['admin.css'];
$meta['js']    = ['admin.js'];

require_once(__DIR__ . '/../../../modele/navbaritems.php');
require_once(__DIR__ . '/../../../controleurs/adminManager.php');
require_once(__DIR__ . '/../../../controleurs/configManager.php');
require_once(__DIR__ . '/../../../controleurs/maintenance_mod.php');

use Services\Admin\Manager\AdminManager as AdminManager;

try {
    $currentPagePath   = AdminManager::getCurrentPagePath();
    $currentConfigPage = AdminManager::getCurrentPageConfig($admin_pages);
    $loadContentName   = 'v_admin_configuration.php';

    $maintenance = new Maintenance\Maintenance($bdd);
    if (isset($_SESSION['token'], $_GET['t']) && $_SESSION['token'] == $_GET['t']) {
        $success = 'Les modifications ont bien été effectuées';
        $_SESSION['token'] = null;
    } elseif (isset($_FILES['uploadFavicon'])) {
        try {
            if ($_FILES['uploadFavicon']['type'] === 'image/x-icon') {
                Services\Admin\Manager\ConfigManager::uploadFavicon($_FILES['uploadFavicon']);
                // Détruit les surcharges serveurs avec le refresh button
                $token = bin2hex(random_bytes(50));
                $_SESSION['token'] = $token;
                header ('Location: ' . '?t=' . $token);
            } else {
                throw new Exception("Ce type d'image n'est pas pris en charge.");
            }
        } catch (Exception $ex) {
            $error = $ex->getMessage();
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
        $token = bin2hex(random_bytes(50));
        $_SESSION['token'] = $token;
        header ('Location: ' . '?t=' . $token);
    } elseif (isset($_POST['css'])) {
        try {
            $contentCss = Services\Admin\Manager\ConfigManager::setCss($_POST['css']);
            // message recherché par post Javascript, on retourne le message
            $createMessage = '<div class="alert alert-success" role="alert">';
            $createMessage .= 'Les modifications ont bien été effectuées';
            $createMessage .= '</div>';
        } catch (Exception $ex) {
            $createMessage = '<div class="alert alert-danger" role="alert">';
            $createMessage .= '<i class="fas fa-times"></i> ' . $ex->getMessage();
            $createMessage .= '</div>';
        }
        echo $createMessage;
        die();
    }
    $contentCss = 'ERREUR: Fichier manquant';
    $contentFooter = array();
    try {
        $contentCss    = Services\Admin\Manager\ConfigManager::getCss($bdd);
    } catch (Exception $ex) {
        
        $error = $ex->getMessage();
    }
    try {
        $contentFooter = Services\Admin\Manager\ConfigManager::getFooter($bdd);
    } catch (Exception $ex) {
        $error = $ex->getMessage();
    }
    
} catch (Exception $ex) {
    $error = $ex->getMessage();
}

require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
