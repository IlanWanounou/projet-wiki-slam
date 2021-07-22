<?php



$firstDate = date('d/m/Y', strtotime('-14 day'));
$dateDiff = 14;
for ($i=0; $i < $dateDiff; $i++) {
    $dateRemove = -$dateDiff+1+$i;

    $datas[] = $logManager->getVisitorsCount(date('Y-m-d', strtotime("$dateRemove day")));
    if ($i === $dateDiff-1) {
        $labels[] = 'Aujourd\'hui';
    } elseif ($i === $dateDiff-2) {
        $labels[] = 'Hier';
    } else {
        $labels[] = date('d/m/Y', strtotime("$dateRemove day"));
    }
}
?>
<script>
$(document).ready(function () {
    const labels = <?= json_encode($labels, JSON_NUMERIC_CHECK) ?>;
    const data = {
        labels: labels,
        datasets: [{
        label: 'Nombre de visiteurs',
        backgroundColor: '#3180b5',
        borderColor: '#000000',
        borderWidth: 1,
        fill: true,
        data: <?= json_encode($datas, JSON_NUMERIC_CHECK) ?>,
    }]
    };
    const config = {
        type: 'line',
        data,
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    };
    var chart = new Chart(
        document.getElementById('chart'),
        config
    );
});

</script>

<h2 class="font-family-lato">🌴 Bienvenue, <b><?= ucfirst($username) ?></b></h2>
<p>Ce n'est pas vous ? <a href="/admin/logout">Changez de compte</a></p>
<br>
<h2 class="font-family-lato" id="visitors">Nombre de visiteurs</h2>
<canvas id="chart" height="40"></canvas>
<br>
<h2 class="font-family-lato">Accès rapide</h2>
<hr>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js"></script>
