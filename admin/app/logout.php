<?php

use Manager\LogManager;

require_once(__DIR__ . '/../../controleurs/session.php');
if (Session\SessionManager::isConnected()) {
    $logManager = new LogManager();
    $logManager->logLogin(2, $_SESSION['username']);
    $_SESSION = null;
    session_destroy();

    session_start();
    $token = bin2hex(random_bytes(50));
    $_SESSION['token'] = $token;
    header('Location: /admin/login?s=' . $token);
} else {
    header('Location: /admin/login');
}

