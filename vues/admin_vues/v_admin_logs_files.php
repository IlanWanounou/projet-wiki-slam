<div class="col-auto mb-4">
    <div class="card text-center bg-light">
        <h1 class="bg-dark">
        <?php
        if ($date === null) { echo '<i class="p-2 text-light fas fa-file-archive"></i>'; }
        else { echo '<i class="text-white-50 fas fa-folder-open"></i>'; }  
        ?>
        </h1>

        <div class="card-body">
            <h5 class="card-title"><?= ucfirst(str_replace('.log', '', $file)) ?></h5>
            <p class="card-text"></p>
            <?php
            if ($date === null) {
                // Plusieurs dates sont affichés
                ?>
                <a href='#' openTo="<?= $file ?>" class="btn btn-primary btn-sm open-directory" title="Ouvrir ce dossier de journalisation"><i class="fas fa-external-link-alt"></i> Ouvrir</a>
                <a href='#' deleteTo="<?= $file ?>" class="btn btn-danger btn-sm delete-directory" title="Supprimer ce dossier de journalisation"><i class="fas fa-trash-alt"></i></a>
                <?php
            } else {
                // Qu'une date, on affiche son contenu
                ?>
                <a href='#' openTo="<?= $date ?>/<?= $file ?>" class="btn btn-primary btn-sm open-file" title="Ouvrir ce fichier de journalisation"><i class="fas fa-external-link-alt"></i> Ouvrir</a>
                <a href='#' deleteTo="<?= $date ?>/<?= $file ?>" class="btn btn-danger btn-sm delete-file" title="Supprimer ce fichier de journalisation"><i class="fas fa-trash-alt"></i></a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
