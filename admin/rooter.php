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
        require_once(Session\SessionManager::rootInAdmin(__DIR__ . '/app/logout.php'));
        break;
    case 'configuration':
        require_once(Session\SessionManager::rootInAdmin(__DIR__ . '/app/panel/config.php'));
        break;
    case 'articles/add':
        require_once(Session\SessionManager::rootInAdmin(__DIR__ . '/app/panel/articleCreate.php'));
        break;
    case 'articles/edit':
        require_once(Session\SessionManager::rootInAdmin(__DIR__ . '/app/panel/articleEdit.php'));
        break;
    default:
        require_once(Session\SessionManager::rootInAdmin(__DIR__ . '/app/panel/panel.php'));
        break;
}
