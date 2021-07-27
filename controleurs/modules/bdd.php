<?php

use Controller\src\Admin\Config\LogManager;

require_once(__DIR__ . '/../../modele/config.php');
require_once(__DIR__ . '/../src/LogManager.php');

try {
    date_default_timezone_set('Europe/Paris');
    $logManager = new LogManager();
    $logManager->logVisitor();

    $bdd = new PDO(sprintf(MYSQL_TEMPLATE, MYSQL_HOST, MYSQL_DBNAME, MYSQL_CHARSET, MYSQL_USERNAME, MYSQL_PASSWORD), MYSQL_USERNAME, MYSQL_PASSWORD);
} catch (Exception $e) {
    try {
        $bdd = new PDO(sprintf(MYSQL_TEMPLATE, MYSQL_HOST, MYSQL_DEV_DBNAME, MYSQL_CHARSET, MYSQL_DEV_USERNAME, MYSQL_PASSWORD), MYSQL_DEV_USERNAME, MYSQL_PASSWORD);
    } catch (Exception $e) {
        http_response_code(500);
        die("[#{$e->getCode()}] Erreur interne au serveur. Merci de vouloir patienter quelque instant");
    }
}
