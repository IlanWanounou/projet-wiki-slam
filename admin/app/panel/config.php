<?php

use Controller\src\Admin\Config\ConfigManager;
use Controller\src\Admin\Config\Maintenance;
use Controller\src\Admin\Path\AdminPathManager;

require_once(__DIR__ . '/../../../controleurs/src/AdminPathManager.php');
require_once(__DIR__ . '/../../../controleurs/src/ConfigManager.php');
require_once(__DIR__ . '/../../../controleurs/modules/maintenance.php');

$meta['title'] = 'Configuration du site';
$meta['css']   = ['admin.css'];
$meta['js']    = ['admin.js'];

$loadContentName   = 'v_admin_configuration.php';

try {

    $currentPagePath   = AdminPathManager::getCurrentPagePath();
    $currentConfigPage = AdminPathManager::getCurrentPageConfig($admin_pages);
    $maintenance = new Maintenance($bdd);

    if (isset($_SESSION['token'], $_GET['t']) && $_SESSION['token'] == $_GET['t']) {
        $success = 'Les modifications ont bien été effectuées';
        $_SESSION['token'] = null;
    } elseif (isset($_FILES['uploadFavicon'])) {
        try {
            if ($_FILES['uploadFavicon']['type'] === 'image/x-icon') {
                ConfigManager::uploadFavicon($_FILES['uploadFavicon']);
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
        try {
            $footer = array($_POST['footer-content-1'], $_POST['footer-content-2']);
            ConfigManager::setFooter($bdd, $footer);
            $token = bin2hex(random_bytes(50));
            $_SESSION['token'] = $token;
            header ('Location: ' . '?t=' . $token);
        } catch (Exception $ex) {
            if ($ex->getCode() == '22001') {
                $error = 'La valeur soumise est trop longue (> 254 caractères)';
            } else {
                $error = 'Erreur interne du serveur';
            }
        }
        
    } elseif (isset($_POST['css'])) {
        try {
            $contentCss = ConfigManager::setCss($_POST['css']);
            // message recherché par post Javascript, on retourne le message
            $createMessage = '<div class="alert alert-success" role="alert">';
            $createMessage .= 'Les modifications ont bien été effectuées';
            $createMessage .= '<button type="button" class="close" data-dismiss="alert" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>';
            $createMessage .= '</div>';
        } catch (Exception $ex) {
            $createMessage = '<div class="alert alert-danger" role="alert">';
            $createMessage .= '<i class="fas fa-times"></i> ' . $ex->getMessage();
            $createMessage .= '<button type="button" class="close" data-dismiss="alert" aria-label="Fermer"><span aria-hidden="true">&times;</span></button>';
            $createMessage .= '</div>';
        }
        echo $createMessage;
        die();
    }
    $contentCss = 'ERREUR: Fichier manquant';
    $contentFooter = array();
    try {
        $contentCss = ConfigManager::getCss($bdd);
    } catch (Exception $ex) {
        
        $error = $ex->getMessage();
    }
    try {
        $contentFooter = ConfigManager::getFooter($bdd);
    } catch (Exception $ex) {
        $error = $ex->getMessage();
    }
    
} catch (Exception $ex) {
    $error = $ex->getMessage();
}

require_once(__DIR__ . '/../../../vues/admin_vues/v_admin_skeleton.php');
