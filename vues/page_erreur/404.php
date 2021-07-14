<?php
$meta['title'] = 'Erreur 404';
$meta['css'] = ['bootstrap.min.css'];
$meta['js'] = ['bootstrap.min.js'];
require_once(__DIR__ . '/../v_header.php');
?>
<body>
<div class='container text-center'>
<header>
        <?php
        $page = null;
        require_once(__DIR__ . '/../v_nav.php');
        ?>
</header>
    <div id="content" class="bg-light ">
    <?php
    $error = 404;
    require_once(__DIR__ . '/../v_error.php');
        ?>
</div>

<?php
require_once(__DIR__ . '/../v_footer.php');
?>
</div>
</body>


