<?php

require_once __DIR__ . "/../../php/init.php";

$pageTitle = "Admin panel - Mon site.com";

ob_start();

if (isset($_COOKIE['id_temporaly_admin']) && !empty($_COOKIE['id_temporaly_admin'])) {
    $id_temp = htmlspecialchars($_COOKIE['id_temporaly_admin']);
    $verify_admin = $db->prepare('SELECT ip FROM admin WHERE temp_id = ?');
    $verify_admin->execute([$id_temp]);
    $verify_admin = $verify_admin->fetch();
    if ($verify_admin) {
        if ($verify_admin['ip'] == getIp()) {
            
            if (isset($_POST['id'])) {
                $id = htmlspecialchars($_POST['id']);
                $delete = $db->prepare('DELETE FROM products WHERE id = ?');
                $delete->execute([$id]);
                header('Location: /admin-panel');
                die();
            }else{
                header('Location: /admin-panel');
                die();
            }

        }else{
            setcookie('id_temporaly_admin', '', time(), '/');
            header('Location: /admin');
            die();
        }
    }else{
        setcookie('id_temporaly_admin', '', time(), '/');
        header('Location: /admin');
        die();
    }
}else{
    header('Location: /admin');
    die();
}
