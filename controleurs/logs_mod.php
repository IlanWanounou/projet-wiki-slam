<?php

use Manager\LogManager;

if (isset($_POST['log'])) {
    if (preg_match('/^[0-9]{2}\/[0-9]{2}\/[0-9]*$/', $_POST['log'])) {

        $dates = explode('/', $_POST['log']);
        $zipName = $dates[2] . '-' . $dates[1] . '-' . $dates[0] . '.zip';

        $logManager = new LogManager();
        $files = $logManager->getFilesInZip($zipName);
        foreach ($files as $file) {
            include(__DIR__ . '/../vues/admin_vues/v_admin_logs_files.php');
        }
        
    }
    die();
    
}
?>

