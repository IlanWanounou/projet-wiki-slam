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
    
    private function uploadImage($image) {
        $target_dir = "/public/images/uploads/";
        $target_file = $target_dir . basename($_FILES[$image]["name"]);
        (move_uploaded_file($_FILES[$image]["tmp_name"], $target_file));

        return htmlspecialchars( basename( $_FILES[$image]["name"]));

    }

    public function insertArticle($titre, $contenue, $intro, $image)
    {
        try {
            $bdd = $this->bdd;

            $urlImage = $this->uploadImage($image);
            $requete = $bdd->prepare('INSERT INTO article (`article_id`, `titre`, `contenue`, `phrase_intro`, `image` `created_at`, `updated_at`, `deleted_at`  ) VALUES (NULL, :titre, :contenue, :intro, :image, CURRENT_TIMESTAMP, NULL , NULL )');

            $requete->execute(array(
                'titre' => $titre,
                'contenue' => $contenue,
                'intro' => $intro,
                'image' => $urlImage
            ));
            $message = 'Votre article a bien été posté';
            $requete->closeCursor();

        } catch (Throwable $e) {
            throw new Exception("Erreur");

        }
    }
}

