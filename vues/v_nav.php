<?php
require_once(__DIR__ . '/../controleurs/session.php');
require_once(__DIR__ . '/../controleurs/articleManager.php');
$articleManager = new Article\ArticleManager($bdd);
$pages = $articleManager->getAllArticles($bdd);
if (!isset($currentPage)) {
    $currentPage = null;
}
?>

<img src='/public/images/banniere_sio.png' class='w-100' alt='Bannière du BTS SIO par Alexandre Ghio' title='Bannière du BTS SIO par Alexandre Ghio'>

<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center navbar-fixed w-100">
    <a class="navbar-brand" href="#">Lexique</a>
    <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav w-100 justify-content-center">
            <?php
            foreach ($pages as $id => $name) {
                if (!is_int($id)) {
                    $id = 'undefined';
                }
                $name = htmlspecialchars($name);
                ?>
                <li class="nav-item<?php
                    if ($currentPage == $id . '/' . $name) {
                        echo ' active';
                    }
                    ?>">
                    <a class="nav-link" href="/article/<?=$id?>-<?=$name?>"><?=$name?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
    if (Session\SessionManager::isConnected()) {
        ?>
        <div class="nav-item align-self-center text-right w-190">
            <a class="btn btn-info btn-sm"  href="/admin/panel"><i class="fas fa-cog"></i> Gérer le site</a>
            <a class="btn btn-danger btn-sm" title="Se déconnecter" href="/admin/logout"><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <?php
    } else {
        ?>
        <div class="nav-item align-self-center text-right w-190">
            <a class="btn btn-info btn-sm" href="/admin/login"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
        </div>
        <?php
        }
    ?>
</nav>
