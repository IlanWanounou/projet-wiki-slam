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
    <?php require_once(__DIR__ . '/../v_error.php') ?>
    <div id="content" class="bg-light ">
    <h1>ERREUR <?= $error = '404' ?> </h1>
    <h2> <?= $message = 'On dirai que tu perdu' ?> </h2>
    <a class="btn btn-primary" href="../../index.php" role="button">Revenir à l'accueil</a>

        <div class="row">
            <div class="form-group">
                <div class="input-group">
                    <input id="1" class="form-control" type="text" name="search" placeholder="Rechercher" required/>
                    <span class="input-group-btn">
                                <button class="btn btn-success" type="submit" disabled>
                                    <i class="glyphicon glyphicon-search" aria-hidden="true"></i>Désactiver
                                </button>
                            </span>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require_once(__DIR__ . '/../v_footer.php');
?>
</body>


