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
            $requete = "";
           $mot = explode(" ", $demmande);
           $i=0;
           foreach ($mot as $value ) {
              if ($i == 0) {
                  $requete .= " WHERE ";
                   } else {
                  $requete .= " OR ";
                   }
               $requete .= "contenue LIKE '%$value%'";
                   $i++;
           }
            $requete = "SELECT article_id, titre, phrase_intro, image FROM article".$requete;
            $requete = $bdd->query($requete);
            return $requete->fetchAll();

        }catch (Throwable $e) {
            throw new Exception($e);
        }



    }
}
