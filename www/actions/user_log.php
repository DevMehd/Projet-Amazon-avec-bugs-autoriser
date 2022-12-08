<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
require_once __DIR__ . "/../../php/init.php";

if ($_POST['submit']) {
    if (isset($_POST['logemail']) && isset($_POST['logpass'])) {
        $logemail = $_POST['logemail'];
        $logpass = $_POST['logpass'];
        $logpass_hash = hash('sha256', $logpass);

        $check = $db->prepare("SELECT id, name, email, password FROM users WHERE email='$logemail'");
        $check->execute();
        $data = $check->fetchALL();
        $row = $check->rowCount();
        // var_dump($data[0]);
        // var_dump($data[0]['name']);
        $date = date('Y-m-d h:i:s');

        $update = $db->prepare("UPDATE users SET last_seen='$date' WHERE email='$logemail'");
        $update->execute();

        if ($row == 1) {
            if (filter_var($logemail, FILTER_VALIDATE_EMAIL)) {
                // $password = hash('sha256', $password)

                if ($data[0]['password'] === $logpass_hash) {
                    $_SESSION['userID'] = $data[0]['id'];
                    $_SESSION['name'] = $data[0]['name'];
                } else {
                    echo "<script type='text/javascript'>alert('Mauvais mot de passe !');window.location.href='./../?p=login/'</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Mauvais email !');window.location.href='./../?p=login'</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Cet email n\'existe pas !');window.location.href='./../?p=login/'</script>";
        }
    }
    echo "<script type='text/javascript'>alert('Bienvenue {$_SESSION['name']} ! Vous avez bien été connecté !');window.location.href='./../'</script>";
    // echo "<script type='text/javascript'>alert('Bienvenue {$_SESSION['username']}');document.location='/../index.php';</script>";
}
