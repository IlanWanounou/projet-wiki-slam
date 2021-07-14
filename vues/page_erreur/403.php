<?php
$meta['title'] = 'Erreur 403';
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
    <?php require_once(__DIR__ . '/../v_error.php') ?>
    <div id="content" class="bg-light ">
        <h1>ERREUR <?= $error = '403' ?> </h1>
        <h2> <?= $message = 'On dirai que tu  n\'as pas acces à cette ressource' ?> </h2>
        <a class="btn btn-primary" href="../../index.php" role="button">Revenir à l'accueil</a>
        <?php
        require_once(__DIR__ . '/../v_footer.php');
        ?>
</body>

