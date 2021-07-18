<?php


namespace Article;


class editArticle
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }


    public function selectAllArticle() {
        $bdd = $this->bdd;

        $requete = $bdd->query('SELECT * FROM article');
        return $requete->fetchAll();
    }

}


