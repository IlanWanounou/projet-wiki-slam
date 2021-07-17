<?php

namespace Article;

use Exception;
use Throwable;

class ArticleManager {

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllArticles()
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->query('SELECT `article_id` as `id`, `titre` as `name` FROM article');
            while ($data = $requete->fetch()) {
                $articles[$data['id']] = $data['name'];
            }
            if (empty($articles)) {
                return [];
            } else {
                return $articles;
            }
            
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

}
