<?php
$meta['title'] = 'Admin';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/../../../vues/v_header.php');
?>
<body>
<div class='container'>
    <header>
        <?php
        $page = null;
        require_once(__DIR__ . '/../../../vues/admin_vues/v_nav_admin.php');
        ?>
    </header>

</div>
</body>
