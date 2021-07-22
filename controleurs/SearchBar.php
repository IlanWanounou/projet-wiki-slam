<?php


namespace SearchBar;
use Exception;
use Throwable;

class recherche
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function rechecher($demmande) {
        $bdd = $this->bdd;
        try {
            $requete = $bdd->query('SELECT article_id, titre, phrase_intro, image FROM article WHERE titre LIKE "%'.$demmande. '%" ');
            return $requete->fetchAll();

        }catch (Throwable $e) {
            throw new Exception($e);
        }



    }
}
