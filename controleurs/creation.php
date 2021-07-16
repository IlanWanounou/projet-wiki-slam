<?php

namespace Creation;

use Exception;
use Throwable;

class CreationDef
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function insertArticle($titre, $contenue)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('INSERT INTO article (`id_article`, `titre`, `contenu`, `created_at`) VALUES (NULL, :titre, :contenue, CURRENT_TIMESTAMP)');

            $requete->execute(array(
                'titre' => $titre,
                'contenue' => $contenue
            ));
            $message = 'Votre article a bien été posté';
            $requete->closeCursor();

        } catch (Throwable $e) {
            throw new Exception("Erreur");

        }
    }
}

