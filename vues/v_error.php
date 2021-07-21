<h1 class="pb-4">ERREUR <?= $error ?></h1>
<?php
if ($error  === 404) {
    echo '<h2> La page n\'existe pas ou a été supprimée </h2>';
?>
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
<?php
} else if ($error===403) {
    echo '<h2> Vous n\'avez pas accès à cette ressource </h2>';
    ?>
    <a class="btn btn-primary mt-3" href="../../index.php" role="button">Revenir à l'accueil</a>
    <div class="row">
    </div>

<?php
    }


?>


