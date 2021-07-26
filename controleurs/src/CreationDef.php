<?php

namespace Controller\src\Admin\Article;

require_once(__DIR__ . '\gestionImage.php');


use gestion;

require_once(__DIR__ . '/gestionImage.php');


use gestion;

use Exception;
use mysqli_sql_exception;

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

        } catch (mysqli_sql_exception $e) {
            throw new Exception("Erreur");

        }
    }

    public static function uploadImage($image): bool
    {
        $gestionImage = new gestion\GestionImage();
        $target_dir = "../vues/images/uploads/";
        $target_file = $target_dir . basename(($image['name']));
        $size = $gestionImage->getSizeFolder($target_dir);
        $sizeAvailable = DIRECTORY_IMAGE_MAXSIZE-$size;

        if (getimagesize(($image["tmp_name"]))) {
            if (file_exists($target_file)) {
                return false;
            }
            if ($sizeAvailable>=$image['size']) {
                return false;
            }

            if (move_uploaded_file(($image["tmp_name"]), $target_file)) {
                return true;
            }
        }
        return false;
    }
}

