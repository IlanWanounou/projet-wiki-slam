<?php

use Controller\src\Admin\Config\ConfigManager;

require_once(__DIR__ . '/../controleurs/modules/bdd.php');
require_once(__DIR__ . '/../controleurs/src/ConfigManager.php');

$footer = ConfigManager::getFooter($bdd);
?>

<footer class='text-center p-1 text-white'>
    <?php
    if (isset($footer[0])) {
        echo $footer[0];
    }
    if (isset($footer[1])) {
        echo $footer[1];
    }
    ?>
</footer>
