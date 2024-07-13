<?php

namespace model;

use PDO;
use Exception;
use PDOStatement;

class OurPDO extends PDO
{

    // Instance unique de PDO pour le singleton
    private static ?OurPDO $instance = null;

    // Constructeur privé pour empêcher l'instanciation sans passer par la méthode getInstance
    private function __construct($dsn, $username = null, $password = null, $options = null)
    {
        // constructeur natif de PDO
        parent::__construct($dsn, $username, $password, $options);
    }

    // Méthode static publique pour obtenir l'instance unique de PDO
    // sera utilisée comme ça : $pdo = OurPDO::getInstance($dsn, $username, $password, $options);
    public static function getInstance($dsn, $username = null, $password = null, $options = null): OurPDO
    {
        if (self::$instance === null) {
            try {
                // Création de l'instance de PDO en utilisant le constructeur privé
                self::$instance = new OurPDO($dsn, $username, $password, $options);
            } catch (Exception $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$instance;
    }


}
