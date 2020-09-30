<?php
require_once "Connection.class.php";

class DAO {
    private static $SELECT_ALL = "SELECT idRestaurant, nom, ville, description FROM Restaurants";
    private static $SELECT_INFO = "SELECT nom, adresse, cp, ville, telephone, description FROM Restaurants WHERE idRestaurant = :id";
    private static $SELECT_AVIS = "SELECT auteur, note, commentaire FROM avis WHERE idRestaurant = :id";

    static function getRestaurants() {
        return self::executeQuery(self::$SELECT_ALL)->fetchAll();
    }

    static function getRestaurant($id) {
        return self::executeQuery(self::$SELECT_INFO, [":id" => $id])->fetch();
    }

    static function getAvis($id) {
        return self::executeQuery(self::$SELECT_AVIS, [":id" => $id])->fetchAll();
    }

    private static function executeQuery($SQL, $values = []) {
        $query = Connection::getPDO()->prepare($SQL);
        foreach ($values as $identifier => $value) {
            $query->bindValue($identifier, $value);
        }
        $query->execute();
        return $query;
    }
}