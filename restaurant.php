<?php
require_once "./classes/DAO.class.php";
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$restaurant = DAO::getRestaurant($id);
$avis = DAO::getAvis($id);
require_once "./views/view-details.php";