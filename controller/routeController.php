<?php

if (isset($_SESSION['MySession'])) {
    $router = $_SESSION['permission_name'];
    switch ($router) {
        case 'Administrateur':
            // si nous sommes Administrateur
            break;
        case 'Modérateur':
            // si nous sommes Modérateur
            break;
        case 'Auteur':
            // si nous sommes Auteur
            break;
        // Abonné par défaut
        default:
            // si nous sommes Abonné
            break;
    }
} else {
    require_once PROJECT_DIRECTORY . "/controller/publicController.php";
}