<script>
    $(document).ready(function () {
        data['labels'] = <?= json_encode($labels, JSON_NUMERIC_CHECK) ?>;
        data['datasets'][0]['data'] = <?= json_encode($datas, JSON_NUMERIC_CHECK) ?>;
        try {
            var chart = new Chart(
                document.getElementById('chart'),
                config
            );
        } catch (error) {
            $('#chart').replaceWith('<div class="alert alert-danger" role="alert">La page ne répond pas</div>');
        }
    });
</script>

<h2 class="font-family-lato">🌴 Bienvenue, <b><?= ucfirst($username) ?></b></h2>
<p>Ce n'est pas vous ? <a href="/admin/logout">Changez de compte</a></p>
<br>
<h2 class="font-family-lato" id="visitors">Nombre de visiteurs</h2>
<noscript>
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
        Cette fonctionnalité nécessite l'activation de JavaScript
    </div>
</noscript>

<canvas id="chart" height="135" class="w-100"></canvas>
<br>
<h2 class="font-family-lato">Accès rapide</h2>
<hr>
<div class="row">
    <?php
    for ($i = 1; $i < count($admin_pages); $i++) {
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
