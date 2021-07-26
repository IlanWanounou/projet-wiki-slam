<?php

use Controller\src\Admin\Config\LogManager;
use Controller\src\Admin\Config\Maintenance;
use Controller\src\Session\SessionManager;

require_once(__DIR__ . '/../src/Session.php');
require_once(__DIR__ . '/../src/LogManager.php');

if (SessionManager::isConnected()) {
    header('Location: /admin/panel');
    die();
}
$maintenance = new Maintenance($bdd);
if ($maintenance->isMaintenance()) {
    $isMaintenance = true;
}
if (isset($_GET['s']) && isset($_SESSION['token']) && $_SESSION['token'] == $_GET['s']) {
    $logoutBefore = true;
    $_SESSION['token'] = null;
}
if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    try {
        $session = new SessionManager($bdd);
        if ($session->isUserExist($_POST['username'])) {
            $session->loginToAccount($_POST['username'], $_POST['password'], (isset($_POST['stayConnected']) && $_POST['stayConnected'] === 'on'));
            $success = true;
            $logManager = new LogManager();
            $logManager->logLogin(1, $_POST['username']);
        } else {
            $logManager = new LogManager();
            $logManager->logLogin(3, $_POST['username']);
            throw new Exception("Le couple nom d'utilisateur / mot-de-passe est incorrecte.");
        }
    } catch (Exception $ex) {
        $error = $ex->getMessage();
    }
}
