<?php
require_once "./classes/DAO.class.php";
require_once "./classes/View.class.php";

class DisplayManager {
    public static function displayRestaurants() {
        View::createView("./views/view-restaurants.php", ["restaurants" => DAO::getRestaurants()]);
    }

    public static function displayDetails() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        View::createView(
            "./views/view-details.php",
            ["restaurant" => DAO::getRestaurant($id), "avis" => DAO::getAvis($id)]
        );
    }
}
