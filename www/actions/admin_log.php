<?php

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])){
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $verify_exist = $db->prepare('SELECT password WHERE email = ?');
        $verify_exist->execute([$email]);
        $verify_exist = $verify_exist->fetch();
        if ($verify_exist) {
            if (password_verify($password, $verify_exist['password'])) {
                $connection = $db->prepare('SELECT id WHERE email = ?');
                $connection->execute([$email]);
                $connection = $connection->fetch();
                setcookie('id_temporaly_admin', $tempo_id, time())
            }
        }
    }
}