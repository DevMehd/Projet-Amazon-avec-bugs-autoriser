<?php

function save_error($message) {
    $_SESSION['error_message'] = $message; // on sauvegarde le message d'erreur en variable de session
    header('Location: ' . $_SERVER['HTTP_REFERER']); // redirection de la ou on vient
    die(); // on arrete l'execution du script
}

// Fonction qui renvoie false si pas d'erreur
// Sinon une chaine de caractere
function get_error() {
    $message = false;
    if (isset($_SESSION['error_message'])) {
        $message = $_SESSION['error_message'];
        unset($_SESSION['error_message']);
    }
    return $message;
}
