<?php

$meta['css'][] = 'bootstrap.min.css';
$meta['css'][] = 'fontawesome.all.min.css';
$meta['js'][]  = 'jquery-3.6.0.min.js';
$meta['js'][]  = 'bootstrap.min.js';

require_once(__DIR__ . '/../../modele/navbaritems.php');
require_once(__DIR__ . '/../v_header.php');
?>
<body>
    <?php
        require_once(__DIR__ . '/v_admin_navbar.php');
    ?>
    <div class='container-fluid'>
        <div class="row">
            <?php
            require_once(__DIR__ . '/v_admin_panel.php');
            ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php
                require_once(__DIR__ . '/v_admin_breadcrumb.php');
                if (isset($loadContentName) && !empty($loadContentName)) {
                    require_once(__DIR__ . '/' . $loadContentName);
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Cette page n'a aucun contenu
                    </div>
                    <?php
                }
                ?>
            </main>
        </div>
    </div>
</body>
