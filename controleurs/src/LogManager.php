<?php

namespace Controller\src\Admin\Config;

use ZipArchive;
use DateTime;
use Exception;

class LogManager
{

    private $zip;

    public function __construct()
    {
        $zip = new ZipArchive();
        $date = date('Y-m-d');
        $filePath = __DIR__ . "/../logs/$date.zip";
        $zip->open($filePath, ZipArchive::CREATE);
        $this->zip = $zip;
    }

    public function logVisitor() {
        $file = 'visitors.log';
        $zip = $this->zip;
        $time = date('H:i:s');
        $sessionId = session_id();
        $currentContent = $zip->getFromName($file);
        if (isset($_SERVER['REDIRECT_URL'])) {
            $contentAppend = "[$time] ($sessionId) " . $_SERVER['REDIRECT_URL'] . "\n";
        } else {
            $contentAppend = "[$time] ($sessionId) " . $_SERVER['REQUEST_URI'] . "\n";
        }
        
        $zip->addFromString($file, $currentContent . $contentAppend);
        $zip->close();
    }

    /**
     * 
     * @param int $state Etat du login :
     * [1] : Connexion réussie.
     * [2] : Déconnexion réussie.
     * [3] : Mauvais identifiant/mot de passe.
     */
    public function logLogin($state, $username) {
        $file = 'logins.log';
        $zip = $this->zip;
        $time = date('H:i:s');
        $sessionId = session_id();
        $currentContent = $zip->getFromName($file);
        
        if ($state === 1) {
            $contentAppend = "[$time] ($sessionId) : Connexion de $username (ip: {$_SERVER['REMOTE_ADDR']})\n";
        } else if ($state === 2) {
            $contentAppend = "[$time] ($sessionId) : Déconnexion de $username (ip: {$_SERVER['REMOTE_ADDR']})\n";
        } else {
            $contentAppend = "[$time] ($sessionId) : Tentative raté de connexion sur $username (ip: {$_SERVER['REMOTE_ADDR']})\n";
        }
        
        $zip->addFromString($file, $currentContent . $contentAppend);
        $zip->close();
    }

    public function getVisitorsCount($date) {

        $zip = new ZipArchive();
        $filePath = __DIR__ . "/../logs/$date.zip";
        if (file_exists($filePath)) {
            $zip->open($filePath, ZipArchive::CREATE);

            $file = 'visitors.log';
            $currentContent = $zip->getStream($file);

            $uniquesVisitors = [];

            while (!feof($currentContent)) {
                $line = fgets($currentContent);
                $line = explode(" ", $line);
                $line[1] = str_replace("(", "", $line[1]);
                $line[1] = str_replace(")", "", $line[1]);
                $uniquesVisitors[$line[1]] = true;
            }
            $zip->close();

            return count($uniquesVisitors);
        } else {
            return 0;
        }
        
    }

    public function getAllDates() {
        $filePath = __DIR__ . "/../logs";
        $files = scandir($filePath);
        foreach ($files as $id => $file) {
            if (preg_match('/^[0-9]*\-[0-9]{2}\-[0-9]{2}\.zip$/', $file)) {
                $date = new DateTime(preg_replace('/\.zip/', '', $file));
                $dates[] = date_format($date, 'd/m/Y');
            }
        }
        if (!isset($dates)) {
            return null;
        } else {
            return $dates;
        }
    }

    public function getFilesInZip($zipName) {
        $zip = new ZipArchive();
        $filePath = __DIR__ . "/../logs/$zipName";

        if (file_exists($filePath)) {
            $zip->open($filePath, ZipArchive::CREATE);
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $files[] = $zip->getNameIndex($i);
            }
            $zip->close();
            if (!empty($files)) {
                return $files;
            } else {
                return [];
            }
            
        } else {
            return [];
        }
    }

    public function searchFilesInZip($search) {
        $matchesFiles = [];
        $files = $this->getAllDates();
        foreach ($files as $file) {
            if (!empty($search) && strpos($file, $search) !== false) {
                $matchesFiles[] = $file;
            }
        }
        return $matchesFiles;
    }

    public function getContent($zipName, $file) {
        $zip = new ZipArchive();
        $filePath = __DIR__ . "/../logs/$zipName";

        if (file_exists($filePath)) {
            $zip->open($filePath, ZipArchive::CREATE);
            $content = $zip->getFromName($file);
            $zip->close();
            return $content;
        } else {
            return null;
        }
    }

    public function close() {
        $this->zip->close();
    }

    public function deleteZip($zipName) {
        unlink(__DIR__ . "/../logs/$zipName");
    }

    public function deleteFileInZip($zipName, $file) {
        $zip = new ZipArchive();
        $filePath = __DIR__ . "/../logs/$zipName.zip";

        if (file_exists($filePath)) {
            $zip->open($filePath, ZipArchive::CREATE);
            $zip->deleteName($file);
            $zip->close();
        } else {
            throw new Exception();
        }
    }
}
