<?php
require_once __DIR__ . "/../../php/init.php";

if (isset($_POST['submit'])) {
    $logname = $_POST['logname'];
    $logpass = $_POST['logpass'];
    $confirm_logpass = $_POST['confirm_logpass'];
    $logemail = $_POST['logemail'];
    $valid = true;
    // $error = "";

    //Check les conditions valides pour les données email, mot de passe et nom utilisateur
    //Check si tous les champs sont remplis
    if (!isset($logname, $logpass, $confirm_logpass, $logemail)) {
        echo "<script type='text/javascript'>alert('Veuillez remplir tous les champs !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    $check_logemail = $db->prepare("SELECT email FROM users WHERE email = :logemail");
    $check_logemail->execute(['logemail' => $logemail]);
    if ($check_logemail->rowCount() > 0) {
        echo "<script type='text/javascript'>alert('Cet email est déjà existant !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    $check_logname = $db->prepare("SELECT name FROM users WHERE username = '$logname'");
    $check_logname->bindValue(1, $logname);
    $check_logname->execute();
    if ($check_logname->rowCount() > 0) {
        echo "<script type='text/javascript'>alert('Ce nom est déjà existant !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    //Check si l'email est un email valide
    if (!filter_var($logemail, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Email invalide !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    //Check si le nom de l'utilisateur au 5 ou plus de caractere
    if (strlen($logname) <= 4 && strpos($logname, ' ') == True) {
        echo "<script type='text/javascript'>alert('Nom invalide !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    //Check si le mot de passe est valide avec une regex
    if (!preg_match('~^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$~', $logpass)) {
        echo "<script type='text/javascript'>alert('Mot de passe invalide !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    //Check si les 2 mots de passe saisi sont identiques
    if ($logpass != $confirm_logpass) {
        echo "<script type='text/javascript'>alert('Veuillez insérer le même mot de passe !');window.location.href='./../?p=login'</script>";
        $valid = false;
    }
    //Si toutes les conditions sont valides, on insere les donnees de l'utilisateur pour la creation de son compte dans la base de donnee
    if ($valid) {
        try {
            $logpass_hash = hash('sha256', $logpass);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $register = $db->prepare("INSERT INTO users (email, password, name, type) VALUES (?, ?, ?, ?)");
            $register->execute([$logemail, $logpass_hash, $logname, 'buyer']);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $db = null;
        echo "<script type='text/javascript'>alert('Vous avez bien été inscrit ! Connectez-vous dès à présent !');window.location.href='./../'</script>";
    }
}
