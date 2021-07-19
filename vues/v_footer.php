<?php

require_once(__DIR__ . '/../controleurs/bdd.php');
require_once(__DIR__ . '/../controleurs/configManager.php');
$footer = Services\Admin\Manager\ConfigManager::getFooter($bdd);
?>

<footer class='text-center p-1 text-white'>
    <?= $footer[0]; ?>
    <?= $footer[1]; ?>
</footer>
