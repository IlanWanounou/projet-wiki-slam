<?php

namespace Controller\src\Admin\Config;

use Exception;
use Throwable;

class Maintenance {

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function isMaintenance() : bool
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->query('SELECT `maintenance` FROM config');
            return (bool)$requete->fetch()[0];
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

    public function setMaintenance(bool $state)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('UPDATE `config` SET `maintenance` = ?');
            $requete->execute(array(
                (int)$state
            ));
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }
}
