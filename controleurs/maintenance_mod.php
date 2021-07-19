<?php

require_once(__DIR__ . '/bdd.php');
require_once(__DIR__ . '/maintenance.php');
require_once(__DIR__ . '/session.php');

$maintenance = new Maintenance\Maintenance($bdd);
$session     = new Session\SessionManager($bdd);
if ($maintenance->isMaintenance() && !$session->isConnected()) {
    header('Location: /admin/login');
    die();
}
