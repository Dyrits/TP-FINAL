<?php
try {
    require_once "./managers/DisplayManager.class.php";
    $details = filter_input(INPUT_GET, 'details', FILTER_VALIDATE_BOOLEAN);
    $details ? DisplayManager::displayDetails() : DisplayManager::displayRestaurants();
} catch (PDOException $exception) {
    $error = "L'accès aux données a échoué (code: $exception->getCode())";
    require_once "./views/view-error.php";
}

