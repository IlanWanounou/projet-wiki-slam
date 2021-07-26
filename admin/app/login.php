<?php

require_once(__DIR__ . '/../../controleurs/src/Maintenance.php');
require_once(__DIR__ . '/../../controleurs/modules/login.php');

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
