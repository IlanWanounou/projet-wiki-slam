<!-- highlight.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js" integrity="sha512-i9pd5Q6ntCp6LwSgAZDzsrsOlE8SN+H5E0T5oumSXWQz5l1Oc4Kb5ZrXASfyjjqtc6Mg6xWbu+ePbbmiEPJlDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css" integrity="sha512-xIf9AdJauwKIVtrVRZ0i4nHP61Ogx9fSRAkCLecmE2dL/U8ioWpDvFCAy4dcfecN72HHB9+7FfQj3aiO68aaaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/theme/ayu-dark.min.css" integrity="sha512-mV3RUXi1gt22jDb4UyRBFhZVFgAIiOfRE6ul+2l1Hcj6glyg6x4xlnjPH+neGm/t6XrFmsMRu4++McQu0asjqg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/css/css.min.js" integrity="sha512-YeNG6eTv+q+p/vvx+E5u05IBRurTlv0jfQuvitZMD+oNe9TfrGw+z4MHHxhPlE3X3csemC5YXlzDLMSZrgb34A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/keymap/sublime.min.js" integrity="sha512-CB1k89Ilzxp1upm9MpHjWR0Ec2wg/OzDfWC/pmjJkDnxmXMl4AhgZ4bYPdkWjlL6NoLfoZppxHf55hunUgg8wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <div id="message">
        <?php
        if (isset($success)) { 
            ?>
            <div class="alert alert-success" role="alert">
                <?= $success ?>
            </div>
            <?php
        } else if (isset($error)) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
            <?php
        }
        ?>
    </div>
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
    <div class="form-group css">
        <form method="post" id="footer-css">
            <div class="form-group">
                <label for="form-footer"><span class="badge badge-primary p-1 rounded-circle"><i class="fas fa-copyright align-middle"></i></span> <b>CSS</b></label>
                <small class="form-text text-muted mb-2">Personnaliser la feuille de style du site (disponible sur toutes les pages)</small>
                <textarea id="myTextArea" class="form-control"><?= $contentCss ?></textarea>
            </div>
            <div class="form-group">
                <button type="button" id="send-css-content" class="btn btn-primary btn-sm" disabled>Sauvegarder</button>
                <button type="reset" id="reset-css-content" class="btn btn-secondary btn-sm" disabled>Réinitialiser</button>
            </div>
        </form>
    </div>
</div>
