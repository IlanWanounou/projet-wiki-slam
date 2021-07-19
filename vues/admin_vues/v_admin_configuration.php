<noscript>
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Cette page nécessite l'activation de JavaScript
    </div>
    <style>
        #content {
            display: none !important;
        }
    </style>
</noscript>
<div id="content">
    <?php
    if (isset($success)) { 
        ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
        <?php
    }
    ?>
    <div class="form-group favicon">
        <label for="form-favicon"><span class="badge badge-primary rounded-circle"><i class="fas fa-wrench align-middle"></i></span> <b>Favicon</b></label>
        <small class="form-text text-muted mb-2">L'image qui représente le site, affiché à gauche du nom du site.</small>
        <form method="post" enctype="multipart/form-data">
            <button type="button" id="form-favicon" class="btn btn-primary btn-sm">Modifier</button>
            <button type="button" id="form-favicon-delete" class="btn btn-danger btn-sm" hidden>Supprimer</button>
            <input id='fileid' name='uploadFavicon' accept=".ico" type='file' hidden/>
            <button type="submit" id="form-favicon-push" class="btn btn-success btn-sm" hidden>Valider</button>
        </form>
        <span><em id="fav-prev-msg">Favicon actuel :</em> </span><img id="preview" src="/favicon.ico" class="mt-2 border bg-light">
        
    </div>
    <div class="form-group maintenance">
        <div>
            <label for="form-maintenance"><span class="badge badge-primary rounded-circle"><i class="fas fa-lock align-middle"></i></span> <b>Maintenance du site</b></label>
            <small class="form-text text-muted mb-2">Activer la maintenance permet d'interdire l'accès au site aux utilisateurs.</small>
            <?php
            if ($maintenance->isMaintenance()) {
                ?>
                <button type="button" id="form-maintenance-off" class="form-maintenance btn btn-info btn-sm">Désactiver</button>
                <?php
            } else {
                ?>
                <button type="button" id="form-maintenance-on" class="form-maintenance btn btn-danger btn-sm"><i class="fas fa-exclamation-triangle"></i> Activer</button>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="form-group footer">
        <form method="post" id="footer-form">
            <label for="form-footer"><span class="badge badge-primary p-1 rounded-circle"><i class="fas fa-copyright align-middle"></i></span> <b>Pied de page</b></label>
            <small class="form-text text-muted mb-2">Modifier le contenu du pied de page (visible sur toutes les pages sauf sur le panel admin)</small>
            <div class="form-group">
                <label for="footer-content-1">1ère ligne</label>
                <input type="text" class="form-control" name="footer-content-1" id="footer-content-1" aria-describedby="footer" placeholder="1ère ligne du pied de page" value="<?= $contentFooter[0] ?>">
            </div>
            <div class="form-group">
                <label for="footer-content-2">2ème ligne</label>
                <input type="text" class="form-control" name="footer-content-2" id="footer-content-2" aria-describedby="footer" placeholder="2ème ligne du pied de page" value="<?= $contentFooter[1] ?>">
            </div>
            <div class="form-group">
                <button type="submit" id="send-footer-content" class="btn btn-primary btn-sm" disabled>Sauvegarder</button>
                <button type="reset" id="reset-footer-content" class="btn btn-secondary btn-sm" disabled>Réinitialiser</button>
            </div>
        </form>
    </div>
</div>
