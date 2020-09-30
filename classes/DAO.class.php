<?php
require_once "Connection.class.php";

class DAO {
    private static $SELECT_ALL = "SELECT idRestaurant, nom, ville, description FROM Restaurants";
    private static $SELECT_INFO = "SELECT nom, adresse, cp, ville, telephone, description FROM Restaurants WHERE idRestaurant = :id";
    private static $SELECT_AVIS = "SELECT auteur, note, commentaire FROM avis WHERE idRestaurant = :id";

    static function getRestaurants() {
        $PDO = Connection::getPDO();
        return $PDO->query(self::$SELECT_ALL);
    }

    static function getRestaurant($id) {
        return self::executeQuery(self::$SELECT_INFO, [":id" => $id])->fetch();
    }

    static function getAvis($id) {
        return self::executeQuery(self::$SELECT_AVIS, [":id" => $id])->fetchAll();
    }

    private static function executeQuery($SQL, $values) {
        $PDO = Connection::getPDO();
        $query = $PDO->prepare($SQL);
        foreach ($values as $identifier => $value) {
            $query->bindValue($identifier, $value);
        }
        $query->execute();
        return $query;
    }
}