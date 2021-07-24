<?php

use Manager\LogManager;

if (isset($_POST['log'])) {
    if (preg_match('/^[0-9]{2}\/[0-9]{2}\/[0-9]*$/', $_POST['log'])) {

        $dates = explode('/', $_POST['log']);
        $date = $dates[2] . '-' . $dates[1] . '-' . $dates[0];
        $zipName = $date . '.zip';

        $logManager = new LogManager();
        $files = $logManager->getFilesInZip($zipName);
        echo '<div class="row mt-3">';
        foreach ($files as $file) {
            // Pas d'include_once
            include(__DIR__ . '/../vues/admin_vues/v_admin_logs_files.php');
        }
        echo '</div>';
        
    }
    die();
} else if (isset($_POST['open'])) {
    if (preg_match('/^[0-9]*\-[0-9]{2}\-[0-9]{2}\/[a-zA-Z0-9]*\.[a-z]{1,4}$/', $_POST['open'])) {
        $logManager = new LogManager();
        $file = explode('/', $_POST['open']);
        $content = $logManager->getContent($file[0] . '.zip', $file[1]);
        include_once(__DIR__ . '/../vues/admin_vues/v_admin_logs_fileContent.php');

    }
    die();
} else if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $files = $logManager->searchFilesInZip($search);
    echo '<div class="row mt-3">';
    foreach ($files as $file) {
        // Pas d'include_once
        $date = null;

        include(__DIR__ . '/../vues/admin_vues/v_admin_logs_files.php');
    }
    echo '</div>';
    die();
}
?>

