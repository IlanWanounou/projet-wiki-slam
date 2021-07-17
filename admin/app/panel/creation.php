<?php


$meta['title'] = 'Creation d\'une définition';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'login.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
$page = 'creation';
require_once(__DIR__ . '/../../../vues/v_header.php');
require_once(__DIR__ . '/../../../vues/admin_vues/v_nav_admin.php');
require_once(__DIR__ . '/../../../vues/admin_vues/v_creation.php');

require_once(__DIR__ . '/../../../controleurs/bdd.php');
require_once(__DIR__ . '/../../../controleurs/creation.php');
try {
    $creation = new Creation\CreationDef($bdd);
    if(isset($_POST['titre']) &&  isset($_POST['contenue']) && isset($_POST['intro']) && isset($_FILES['image']) && !empty($_POST['titre'] && $_POST['contenue'] &&  $_POST['intro'])  && $_FILES['image']) {
        $creation->insertArticle(($_POST['titre']), ($_POST['contenue']), ($_POST['intro']), ($_FILES['image'] ));
    }
} catch (Exception $ex) {
    $error = $ex->getMessage();
}


