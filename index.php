<?php
session_start();

$meta['title'] = 'Lexique - BTS SIO SLAM';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/controleurs/session.php');
require_once(__DIR__ . '/vues/v_header.php');
?>
<body>
    <div class='container'>
        <header>
            <?php
            $page = null;
            require_once(__DIR__ . '/vues/v_nav.php');
            ?>
        </header>
        <div id="content">
            <!-- content -->
        </div>
    </div>
    <?php
    require_once(__DIR__ . '/vues/v_footer.php');
    ?>
</body>
