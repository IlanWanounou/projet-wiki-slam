<div class="col-auto">
    <div class="card text-center bg-light">
        <em><small>Fichier de log</small></em>
        <div class="card-body">
            <h5 class="card-title"><?= ucfirst(str_replace('.log', '', $file)) ?></h5>
            <p class="card-text"></p>
            <a href='#' openTo="<?= $date ?>/<?= $file ?>" class="btn btn-primary btn-block btn-sm open-file">Ouvrir le fichier</a>
        </div>
    </div>
</div>
