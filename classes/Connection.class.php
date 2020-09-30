<?php
class Connection {
    public static function getPDO() {
        try {
            $PDO = new PDO(
                "mysql:host=localhost;dbname=restaurant",
                "ENI",
                "M25SQL#05N09",
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
            );
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            $message = "Erreur PDO".$exception->getFile()." : ".$exception->getLine()." : ".$exception->getMessage();
            die($message);
        }
        return $PDO;
    }
}