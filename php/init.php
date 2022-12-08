<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/db.php';

// CONFIG
$router_pages = ['home', 'contact', 'admin', 'admin-panel', 'admin-commandes', 'admin-product', 'products', 'login'];

// Inclure les utilitaires
require_once __DIR__ . '/utils/errors.php';

function getIp(){
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif (isset($_SERVER['HTTP_CLIENT_IP'])){
        $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// inclure tous les fichiers du dossier sql

// Inclure toutes les classes
