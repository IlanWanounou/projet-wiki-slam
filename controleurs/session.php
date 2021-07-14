<?php

namespace Session;

use Exception;
use Throwable;

class SessionManager {

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function isUserExist($username) : bool
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT COUNT(*) FROM users WHERE username = ?');
            $requete->execute(array(
                $username
            ));
            $user = $requete->fetch();
            return ($user[0]);
        } catch (Throwable $e) {
            throw new Exception("Erreur interne du serveur");
        }
    }

    public function loginToAccount($username, $password, $stayConnected)
    {
        try {
            $bdd = $this->bdd;
            $requete = $bdd->prepare('SELECT * FROM users WHERE username = ?');
            $requete->execute(array(
                $username
            ));
            $user = $requete->fetch();
            if (isset($user['pass']) && password_verify($password, $user['pass'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['pass'] = $user['pass'];
                $_SESSION['lastconnect'] = $user['lastconnect'];
                $_SESSION['stayConnected'] = $stayConnected;
            } else {
                $_SESSION = null;
                throw new Exception();
            }
        } catch (Throwable $e) {
            throw new Exception("Le couple nom d'utilisateur / mot-de-passe est incorrecte.");
        }
    }
    
    public static function isConnected() : bool
    {
        return (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['pass']));
    }
}
