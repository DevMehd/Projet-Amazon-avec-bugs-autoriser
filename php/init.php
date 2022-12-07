<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/db.php';

// CONFIG
$router_pages = ['home', 'contact', 'admin', 'admin-panel', 'products', 'login', 'logout'];
$exclude_pages = ['login'];

// Inclure les utilitaires
require_once __DIR__ . '/utils/errors.php';

// Inclure tous les fichiers du dossier sql

// Inclure toutes les classes
