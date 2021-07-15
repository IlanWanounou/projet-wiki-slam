<?php $meta['title'] = 'Se connecter';
$meta['css'] = ['bootstrap.min.css', 'fontawesome.all.min.css', 'login.css'];
$meta['js'] = ['jquery-3.6.0.min.js', 'bootstrap.min.js'];
require_once(__DIR__ . '/../../vues/v_header.php');
?>
<body>
<div class='container'>

    <?php
    $page = 'creation';
    require_once(__DIR__ . '/v_nav_admin.php')
    ?>
    <h1 class="text-center">Creation d'une définition</h1>
    <form class="col-lg-6 offset-lg-3 ">
            <input type="text" placeholder="Definition">
            <span class="input-group-btn">
       <button class="btn btn-primary">Creer</button>
     </span>
    </form>

</div>
