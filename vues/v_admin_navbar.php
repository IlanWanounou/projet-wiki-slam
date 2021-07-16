<nav class="navbar navbar-dark sticky-top bg-dark flex-nowrap p-1">
    <button class="navbar-toggler d-md-none collapsed m-2" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">Panel d'administration</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <button class="btn btn-light btn-sm" title="Connecté sous : <?= $_SESSION['username'] ?>"><i class="fas fa-user-circle"></i> <b><?= $_SESSION['username'] ?></b></button>
            <a class="btn btn-danger btn-sm" title="Se déconnecter" href="/admin/logout"><i class="fas fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>
