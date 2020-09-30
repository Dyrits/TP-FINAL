<?php
try {
    require_once "./classes/DisplayManager.class.php";
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    DisplayManager::displayPage($action);
} catch (PDOException $exception) {
    DisplayManager::displayError($exception);
}

