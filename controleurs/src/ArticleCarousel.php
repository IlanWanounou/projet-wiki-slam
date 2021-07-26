<?php

namespace Controller\src\Admin\Article;

use Exception;
use Throwable;

class ArticleCarousel {

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllArticles()
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->query('SELECT `titre` as `title`, `phrase_intro` as `desc`, `image` as `img` FROM article');
            return $requete->fetchAll();
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

    public static function getStatusCode($img)
    {
        $handle = curl_init($_SERVER['SERVER_NAME'] . $img);
        curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($handle);
        $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        return $httpCode;
    }

    
}
