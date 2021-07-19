<?php

use Maintenance\Maintenance;

require_once(__DIR__ . '/../../controleurs/bdd.php');
require_once(__DIR__ . '/../../controleurs/session.php');
require_once(__DIR__ . '/../../controleurs/maintenance.php');

if (Session\SessionManager::isConnected()) {
    header('Location: /admin/pannel');
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
        $session = new Session\SessionManager($bdd);        
        if ($session->isUserExist($_POST['username'])) {
            $session->loginToAccount($_POST['username'], $_POST['password'], (isset($_POST['stayConnected']) && $_POST['stayConnected'] === 'on'));
            $success = true;
        } else {
            throw new Exception("Le couple nom d'utilisateur / mot-de-passe est incorrecte.");
        }
    } catch (Exception $ex) {
        $error = $ex->getMessage();
    }
    
}

$meta['title'] = 'Se connecter';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'login.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/../../vues/v_header.php');
?>
<body>
    <div class='container'>
        <header>
            <?php
            $page = null;
            require_once(__DIR__ . '/../../vues/v_nav.php');
            ?>
        </header>
        <div id='content' class='bg-light p-3'>
            <?php
            require_once(__DIR__ . '/../../vues/v_login.php');
            ?>
        </div>
    </div>
    <?php
    require_once(__DIR__ . '/../../vues/v_footer.php')
    ?>
</body>
