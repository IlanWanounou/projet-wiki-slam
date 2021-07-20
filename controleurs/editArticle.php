<?php


namespace Article;


use mysql_xdevapi\Exception;

include 'creation.php';

class editArticle
{

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }


    public function selectArticle()
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->query('SELECT article_id, titre, deleted_at FROM article');
            return $requete->fetchAll();
        } catch (Throwable $e) {
            throw  new Exception('error');
        }
    }

    public function selectAllById($id)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT * FROM article WHERE `article_id` = ?');
            $requete->execute(array(
                $id
            ));
            return $requete->fetch();
        } catch (Throwable $e) {
            throw  new Exception('error');
        }
    }

    public function OnOfflineArticle($id)
    {
        $bdd = $this->bdd;
        try {
            $isOffline = $this->isOffline($id);
            if (is_null($isOffline['deleted_at'])) {
                $requete = $bdd->prepare('UPDATE article SET `updated_at` = CURRENT_TIMESTAMP, `deleted_at` = CURRENT_TIMESTAMP  WHERE `article_id` = ?');
            } else {
                $requete = $bdd->prepare('UPDATE article SET `updated_at` = CURRENT_TIMESTAMP, `deleted_at` = NULL WHERE `article_id` = ?');
            }
            $requete->execute(array(
                $id
            ));
           return $requete->fetch();
        } catch (Throwable $e) {
            throw new Exception($e);
        }
    }

    private function isOffline($id)
    {
        $bdd = $this->bdd;
        try {
            $requete = $bdd->prepare('SELECT deleted_at FROM article WHERE `article_id` = ?');
            $requete->execute(array(
                $id
            ));
            return $requete->fetch();
        } catch (Throwable $e) {
            throw  new Exception($e);
        }


    }

    public function articleUpdate($id, $titre, $contenue, $intro, $image)
    {

        try {
            $bdd = $this->bdd;
            $isUpload = false;

            if ($image['error'] != 0) {
                $requete = $bdd->prepare('UPDATE article SET `titre` = :titre, `contenue` = :contenue, `phrase_intro` = :intro, `updated_at` = CURRENT_TIMESTAMP  where article_id = :id');
                $requete->execute(array(
                    'id' => $id,
                    'titre' => $titre,
                    'contenue' => $contenue,
                    'intro' => $intro
                ));
                $requete->closeCursor();

            } else {
                $isUpload = \Creation\CreationDef::uploadImage($image);
                if ($isUpload) {
                    $requete = $bdd->prepare('UPDATE article SET `titre` = :titre, `contenue` = :contenue, `phrase_intro` = :intro, `image` = :image, `updated_at` = CURRENT_TIMESTAMP  where article_id = :id');
                    $requete->execute(array(
                        'id' => $id,
                        'titre' => $titre,
                        'contenue' => $contenue,
                        'intro' => $intro,
                        'image' => $image['name']
                    ));
                    $requete->closeCursor();
                }
            }
        } catch (\Throwable $e) {
            throw new Exception($e);
        }
    }
}


