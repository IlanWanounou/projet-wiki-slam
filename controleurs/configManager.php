<?php

namespace Services\Admin\Manager;

use Exception;
use Throwable;

abstract class ConfigManager {

    public static function uploadFavicon($image)
    {
        try {
            $target_file = '../favicon.ico';

            if (getimagesize(($image["tmp_name"]))) {
                if (move_uploaded_file(($image["tmp_name"]), $target_file)) {
                    return true;
                }
            }
        } catch (Throwable) {
            throw new Exception('error');
        }
        
    }

    public static function getFooter($bdd) : array
    {
        try {
            $requete = $bdd->query('SELECT `footerTop`, `footerBottom` FROM config');
            $footers = $requete->fetch();
            return $footers;
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
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
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

}
