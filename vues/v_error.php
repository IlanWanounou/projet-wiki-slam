<h1 class="pb-4">ERREUR <?= $error ?></h1>
<?php
if ($error === 404) {
    echo '<h2> La page n\'existe pas ou a été supprimée </h2>';
    ?>

    <a class="btn btn-primary" href="../../index.php" role="button">Revenir à l'accueil</a>

    <div class="row">
        <form class="form-inline"  action="/" method="GET">
            <div class="form-group mx-sm-3 mb-2">
                <input type="search" class="form-control" name="q" placeholder="Rechreche" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
        </form>
    </div>

    <?php
} elseif ($error === 403) {
    echo '<h2> Vous n\'avez pas accès à cette ressource </h2>';
    ?>
    <a class="btn btn-primary mt-3" href="../../index.php" role="button">Revenir à l'accueil</a>
    
    <div class="row"></div>

<?php }
