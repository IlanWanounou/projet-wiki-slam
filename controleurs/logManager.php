<?php

namespace Manager;

use ZipArchive;

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

}
