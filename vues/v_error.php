<h1>ERREUR <?= $error ?></h1>
<?php
if ($error  === 404) {
    echo '<h2> On dirai que es perdu </h2>';
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
    echo '<h2> On dirai que tu n\'as pas acces à cette ressource </h2>';
    echo '<a class="btn btn-primary" href="../../index.php" role="button">Revenir à l\'accueil</a>';

    }


?>


