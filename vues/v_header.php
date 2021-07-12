<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Ilan Wanounou, Angelo Tremoureux">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title><?= $meta['title'] ?></title>
    <link href="/public/css/global.css" rel="stylesheet">
    <?php
    // Parcours chaque fichier CSS
    foreach ($meta['css'] as $cssUri) {
        echo "<link href='/public/css/$cssUri' rel='stylesheet'>";
    }
    // Parcours chaque fichier JS
    foreach ($meta['js'] as $jsUri) {
        echo "<script type='text/javascript' src='/public/js/$jsUri'></script>";
    }
    ?>
</head>
