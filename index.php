<?php
$meta['title'] = 'titre de la page';
$meta['css'] = ['bootstrap.min.css'];
$meta['js'] = ['bootstrap.min.js'];
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
    require_once(__DIR__ . '/vues/v_footer.php')
    ?>
</body>
