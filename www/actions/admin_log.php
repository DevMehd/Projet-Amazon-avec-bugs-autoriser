<?php

require_once __DIR__ . "/../../php/init.php";

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $verify_exist = $db->prepare('SELECT password FROM admin WHERE email = :email');
        $verify_exist->execute(['email' => $email]);
        $verify_exist = $verify_exist->fetch();
        if ($verify_exist) {
            if (password_verify($password, $verify_exist['password'])) {
                $connection = $db->prepare('SELECT id FROM admin WHERE email = ?');
                $connection->execute([$email]);
                $connection = $connection->fetch();
                $bytes = 50;
                $cstrong = true;
                $bytes = openssl_random_pseudo_bytes($bytes, $cstrong);
                $temp_id   = bin2hex($bytes);
                setcookie('id_temporaly_admin', $temp_id, time()+60*30, '/');
                $add_id = $db->prepare('UPDATE admin SET temp_id = ? WHERE admin.email = ?');
                $add_id->execute([$temp_id, $email]);
                header('Location: /admin-panel');
                die();
            }
        }
    }
}