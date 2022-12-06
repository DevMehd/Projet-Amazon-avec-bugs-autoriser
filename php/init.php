<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/db.php';

// CONFIG
$router_pages = ['home', 'contact', 'admin', 'admin-panel'];

// inclure les utilitaires
require_once __DIR__ . '/utils/errors.php';

// inclure tous les fichiers du dossier sql

// inclure toutes les classes
