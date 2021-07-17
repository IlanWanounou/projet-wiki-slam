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

    public function articleExists($articleId) : bool
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT COUNT(*) FROM article WHERE `article_id` = ?');
            $requete->execute(array(
                $articleId
            ));
            return $requete->fetch()[0] == 1;
            
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

    public function getName($articleId)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT `titre` as `title` FROM article WHERE `article_id` = ?');
            $requete->execute(array(
                $articleId
            ));
            return $requete->fetch()[0];
            
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

    public function getContent($articleId)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT `contenue` as `content` FROM article WHERE `article_id` = ?');
            $requete->execute(array(
                $articleId
            ));
            return $requete->fetch()['content'];
            
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

}
