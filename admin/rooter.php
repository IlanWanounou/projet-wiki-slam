<?php

session_start();
require_once(__DIR__ . '/../controleurs/bdd.php');
require_once(__DIR__ . '/../controleurs/session.php');

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
        require_once(__DIR__ . '/app/logout.php');
        break;
    default:
        // Panel d'administration
        if (Session\SessionManager::isConnected()) {
            require_once(__DIR__ . '/app/panel/panel.php');
        } else {
            require_once(__DIR__ . '/app/login.php');
        }
        
        break;
}
