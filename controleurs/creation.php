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

    public function insertArticle($titre, $contenue, $intro, $image) : bool
    {
        try {
            $isUpload = false;
            $bdd = $this->bdd;
            $isUpload = $this->uploadImage($image);
            if ($isUpload) {
                $requete = $bdd->prepare('INSERT INTO article (`article_id`, `titre`, `contenue`, `phrase_intro`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES (NULL, :titre, :contenue, :intro, :image, CURRENT_TIMESTAMP, NULL, NULL)');
                $requete->execute(array(
                    'titre' => $titre,
                    'contenue' => $contenue,
                    'intro' => $intro,
                    'image' => ($image['name'])
                ));
                $message = 'Votre article a bien été posté';
                $requete->closeCursor();
                return true;
            } else {
                return false;
            }

        } catch (Throwable $e) {
            throw new Exception("Erreur");

        }
    }

    public static function uploadImage($image): bool
    {
        $target_dir = "../vues/images/uploads/";
        $target_file = $target_dir . basename(($image['name']));

        if (getimagesize(($image["tmp_name"]))) {
            if (file_exists($target_file)) {
                return false;
            }
            if (count(scandir($target_dir)) >= 20) {
                return false;
            }

            if (move_uploaded_file(($image["tmp_name"]), $target_file)) {
                return true;
            }
        }
        return false;
    }
}

