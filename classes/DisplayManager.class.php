<?php
require_once "./classes/DAO.class.php";
require_once "./classes/View.class.php";

class DisplayManager {
    private static function displayRestaurants() {
        View::createView("./views/view-restaurants.php", ["restaurants" => DAO::getRestaurants()]);
    }

    private static function displayDetails() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        View::createView("./views/view-details.php", ["restaurant" => DAO::getRestaurant($id), "avis" => DAO::getAvis($id)]);
    }

    public static function displayError($exception) {
        View::createView("./views/view-error.php", ["error" => "L'accès aux données a échoué (code: $exception->getCode())"]);
    }

    public static function displayPage($action) {
        switch ($action) {
            case "details":
                self::displayDetails();
                break;
            default:
                self::displayRestaurants();
                break;
        }
    }
}
