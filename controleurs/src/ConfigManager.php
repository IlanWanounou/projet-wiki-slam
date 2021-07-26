<?php

namespace Controller\src\Admin\Config;

use Exception;
use Throwable;
use mysqli_sql_exception;

abstract class ConfigManager {

    public static function uploadFavicon($image)
    {
        try {
            $target_file = __DIR__ . '/../../favicon.ico';

            if (getimagesize(($image["tmp_name"]))) {
                if (move_uploaded_file(($image["tmp_name"]), $target_file)) {
                    return true;
                } else {
                    throw new Exception("Erreur interne du serveur");
                }
            }
        } catch (Throwable $e) {
            throw new Exception('Impossible de transférer ce fichier');
        }
        
    }

    public static function getFooter($bdd) : array
    {
        try {
            $requete = $bdd->query('SELECT `footerTop`, `footerBottom` FROM config');
            $footers = $requete->fetch();
            return $footers;
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    public static function setFooter($bdd, array $footer) : void
    {
        try {
            $requete = $bdd->prepare('UPDATE `config` SET `footerTop` = ?, `footerBottom` = ?');
            $requete->execute(array(
                $footer[0],
                $footer[1]
            ));
        } catch (mysqli_sql_exception $e) {
            throw $e;
        }
    }

    public static function getCss() : string
    {
        try {
            $path = __DIR__ . "/../../vues/css/global.css";
            if (file_exists($path)) {
                $myfile = fopen($path, "r");
                if ($myfile) {
                    $reader = fread($myfile,filesize($path));
                    fclose($myfile);
                    return $reader;
                } else {
                    throw new Exception("Erreur interne du serveur");
                }
            } else {
                $page = '/* Feuille de style globale */';
                ConfigManager::setCss($page);
                return ConfigManager::getCss();
            }
            
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setCss($css) : void
    {
        try {
            file_put_contents(__DIR__ . "/../../vues/css/global.css", $css);
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

}
