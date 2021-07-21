<h2 class="font-family-lato">🌴 Bienvenue, <b><?= ucfirst($username) ?></b></h2>
<p>Ce n'est pas vous ? <a href="">Changez de compte</a></p>
<div class="row">
    <?php
    for ($i=1; $i < count($admin_pages); $i++) { 
        $item = $admin_pages[$i];
        if (!isset($item['header']) || isset($item['header']) && $item['header'] === false) {
            ?>
            <div class="col-6 col-sm-4 col-md-4 col-lg-3 mb-4">
                <div class="card h-100">
                    <div class="card-img-top text-center justify-content-center d-flex align-items-center" style="height: 100px; background: radial-gradient(<?=$item['color']?>ad, <?=$item['color']?>);">
                        <h1><i class="item-scale-transparent <?= $item['icon']; ?>"></i></h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['title'] ?></h5>
                        <p class="card-text"><?= $item['desc'] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= $item['href'] ?>" type="button" class="btn btn-primary btn-sm btn-block"><i class="fas fa-search"></i> Accéder à la page</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
