<?php

session_start();

require_once(__DIR__ . '/../modele/admin_pages_config.php');
require_once(__DIR__ . '/../controleurs/modules/bdd.php');
require_once(__DIR__ . '/../controleurs/src/Session.php');

use \Controller\src\Session\SessionManager as SessionManager;

if (!isset($_GET['action'])) {
    $requestedPage = null;
} else {
    $requestedPage = $_GET['action'];
}
switch ($requestedPage) {
    case 'login':
        require_once(__DIR__ . '/app/login.php');
        break;
    case 'logout':
        require_once(SessionManager::rootInAdmin(__DIR__ . '/app/logout.php'));
        break;
    case 'configuration':
        require_once(SessionManager::rootInAdmin(__DIR__ . '/app/panel/config.php'));
        break;
    case 'articles/add':
        require_once(SessionManager::rootInAdmin(__DIR__ . '/app/panel/articleCreate.php'));
        break;
    case 'articles/edit':
        require_once(SessionManager::rootInAdmin(__DIR__ . '/app/panel/articleEdit.php'));
        break;
    case 'logs':
        require_once(SessionManager::rootInAdmin(__DIR__ . '/app/panel/logs.php'));
        break;
    default:
        require_once(SessionManager::rootInAdmin(__DIR__ . '/app/panel/panel.php'));
        break;
}
