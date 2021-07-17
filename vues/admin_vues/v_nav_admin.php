<?php
require_once(__DIR__ . '/../../controleurs/session.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center navbar-fixed w-100">
    <a class="navbar-brand" href="v_nav_admin.php">Administration</a>
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav w-100 justify-content-center">
            <li class="nav-item" <?php
            if ($page == 'creation') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="creation">Creation</a>
            </li>
            <li class="nav-item<?php
            if ($page == 'edit') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="">Edition</a>
            </li>

            <li class="nav-item<?php
            if ($page == 'suppr') {
                echo ' active';
            }
            ?>">
                <a class="nav-link" href="">Suppression</a>
            </li>

        </ul>
    </div>
    <?php
    if (Session\SessionManager::isConnected()) {
        ?>
        <div class="nav-item align-self-center">
            <a class="btn btn-info btn-sm"  href="../../admin/panel"><i class="fas fa-cog"></i> Gérer le site</a>
            <a class="btn btn-danger btn-sm" title="Se déconnecter" href="/admin/logout"><i class="fas fa-sign-out-alt"></i></i></a>
        </div>
        <?php
    } else {
        ?>
        <div class="nav-item align-self-center">
            <a class="btn btn-info btn-sm" href="../../admin/login"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
        </div>
        <?php
    }
    ?>
</nav>
