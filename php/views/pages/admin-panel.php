<?php
$pageTitle = "Admin panel - Mon site.com";

ob_start();
?>

if (isset($_COOKIE['id_temporaly_admin']) && !empty($_COOKIE['id_temporaly_admin'])) {
    $id_temp = htmlspecialchars($_COOKIE['id_temporaly_admin']);
    
}