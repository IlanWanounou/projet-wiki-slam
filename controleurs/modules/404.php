<?php
if (session_status() !== 2) {
    session_start();
}

$meta['title'] = 'Erreur 404';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'error.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/../../vues/v_header.php');
?>
<body>
    <div class='container text-center'>
        <header>
            <?php
            $page = null;
            require_once(__DIR__ . '/../../vues/v_nav.php');
            ?>
        </header>
        <div id="content" class="bg-light ">
            <?php
            $error = 404;
            require_once(__DIR__ . '/../../vues/v_error.php');
            ?>
        </div>

        <?php
        require_once(__DIR__ . '/../../vues/v_footer.php');
        ?>
    </div>
</body>


