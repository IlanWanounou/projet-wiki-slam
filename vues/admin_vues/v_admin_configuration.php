<?php
if (isset($success)) { 
    ?>
    <div class="alert alert-success" role="alert">
        <?= $success ?>
    </div>
    <?php
}
?>

<div class="form-group">
    <label for="form-favicon"><span class="badge badge-primary rounded-circle"><i class="fas fa-wrench"></i></span> <b>Favicon</b></label>
    <small class="form-text text-muted mb-2">L'image qui représente le site, affiché à gauche du nom du site.</small>
    <form method="post" enctype="multipart/form-data">
        <button type="button" id="form-favicon" class="btn btn-primary btn-sm">Modifier</button>
        <button type="button" id="form-favicon-delete" class="btn btn-danger btn-sm" hidden>Supprimer</button>
        <input id='fileid' name='uploadFavicon' accept=".ico" type='file' hidden/>
        <button type="submit" id="form-favicon-push" class="btn btn-success btn-sm" hidden>Valider</button>
    </form>
    <span><em id="fav-prev-msg">Favicon actuel :</em> </span><img id="preview" src="/favicon.ico" class="mt-2 border bg-light">
    
</div>
<div class="form-group">
    <label for="form-maintenance"><span class="badge badge-primary rounded-circle"><i class="fas fa-lock"></i></span> <b>Maintenance du site</b></label>
    <small class="form-text text-muted mb-2">Activer la maintenance permet d'interdire l'accès au site aux utilisateurs.</small>
    <?php
    if (isset($_SERVER['maintenance']) && $_SERVER['maintenance'] === true) {
        ?>
        <button type="button" id="form-maintenance-on" class="btn btn-danger btn-sm" disabled><i class="fas fa-exclamation-triangle"></i> Activer</button>
        <button type="button" id="form-maintenance-off" class="btn btn-primary btn-sm">Désactiver</button>
        <?php
    } else {
        ?>
        <button type="button" id="form-maintenance-on" class="btn btn-danger btn-sm"><i class="fas fa-exclamation-triangle"></i> Activer</button>
        <button type="button" id="form-maintenance-off" class="btn btn-primary btn-sm" disabled>Désactiver</button>
        <?php
    }
    ?>
</div>
<button type="submit" class="btn btn-primary mb-2" disabled>Envoyer</button>
