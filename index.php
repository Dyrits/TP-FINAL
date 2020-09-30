<?php
require_once "./classes/DAO.class.php";
$restaurants = DAO::getRestaurants();
require_once "./views/view-restaurants.php";