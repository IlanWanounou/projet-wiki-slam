<?php

use Controller\src\Admin\Config\Maintenance;
use Controller\src\Session\SessionManager;

require_once(__DIR__ . '/../modules/bdd.php');
require_once(__DIR__ . '/../src/Maintenance.php');
require_once(__DIR__ . '/../src/Session.php');

$maintenance = new Maintenance($bdd);
$session     = new SessionManager($bdd);
if ($maintenance->isMaintenance() && !$session->isConnected()) {
    header('Location: /admin/login');
    $isMaintenance = true;
    die();
}
