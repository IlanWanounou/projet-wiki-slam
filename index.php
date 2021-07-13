<?php
$meta['title'] = 'titre de la page';
$meta['css'] = ['bootstrap.min.css'];
$meta['js'] = ['bootstrap.min.js'];
require_once(__DIR__ . '/vues/v_header.php');
?>
<body>
    <header>
        <?php
        $page = 'c#';
        require_once(__DIR__ . '/vues/v_nav.php');
        ?>
    </header>
    <div id="content">
        <!-- content -->
    </div>
    <footer>
        <?php
        require_once(__DIR__ . '/vues/v_footer.php')
        ?>
    </footer>
</body>
