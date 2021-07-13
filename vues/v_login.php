<?php
if (!isset($username)) {
    $username = null;
}
?>
<form method="post">
    <?php
    if (isset($error) && $error) {
    ?>
    <div class="alert alert-danger fade-in" role="alert">
        <i class="fas fa-times"></i>
        <?= $error ?>
    </div>
    <?php
    } else if (isset($success) && $success) {
    ?>
    <div class="alert alert-success" role="alert">
        <i class="fas fa-spinner fa-spin font-weight-bold"></i>
        Connexion réussie. Redirection en cours...
    </div>
    <script>
    setTimeout(() => {
        window.location.replace("/admin/panel");
    }, 2000);
    </script>
    <noscript>
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-times"></i>
            Javascript est désactivé dans votre navigateur web. Pour revenir a l'accueil, cliquez <a href="/">ici</a>.
        </div>
    </noscript>
    <?php
    } else if (isset($logoutBefore) && $logoutBefore) {
    ?>
    <div class="alert alert-success" role="alert">
        <i class="fas fa-check"></i>
        Vous avez été correctement déconnecté
    </div>
    <?php
    }
    ?>
    <div class="form-group">
        <label for="form-username">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="username" id="form-username" aria-describedby="username" placeholder="Nom d'utilisateur" value="<?= $username ?>">
    </div>
    <div class="form-group">
        <label for="form-password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="form-password" placeholder="Mot de passe">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="stayConnected" id="stayConnected">
        <label class="form-check-label" for="stayConnected">Restez connecter</label>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
