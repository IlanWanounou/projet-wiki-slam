<?php
$meta['title'] = 'Erreur 404';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/../../vues/v_header.php');
?>
<div>
<div class='container text-center'>
    <header>
        <?php
        $page = null;
        require_once(__DIR__ . '/../../vues/v_nav.php');
        ?>
    </header>
    <div id="content" class="bg-light ">
        <?php
        $error = 403;
        require_once(__DIR__ . '/../../vues/v_error.php');
        ?>
    </div>
    <div class="footer-403">
    <?php
    require_once(__DIR__ . '/../../vues/v_footer.php');
    ?>
</div>
</div>



