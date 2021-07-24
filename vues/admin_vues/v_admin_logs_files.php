<div class="col-auto">
    <div class="card text-center bg-light">
        <em><small>Fichier de log</small></em>
        <div class="card-body">
            <h5 class="card-title"><?= ucfirst(str_replace('.log', '', $file)) ?></h5>
            <p class="card-text"></p>
            <a href='#' openTo="<?= $date ?>/<?= $file ?>" class="btn btn-primary btn-sm open-file" title="Ouvrir ce fichier de journalisation"><i class="fas fa-external-link-alt"></i> Ouvrir</a>
            <a href='#' deleteTo="<?= $date ?>/<?= $file ?>" class="btn btn-danger btn-sm delete-file" title="Supprimer ce fichier de journalisation"><i class="fas fa-trash-alt"></i></a>
        </div>
    </div>
</div>
