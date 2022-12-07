<?php
$pageTitle = "Admin login - Mon site.com";

ob_start();
?>

<form action="actions/admin_log.php" method="post">
    <input type="email" name="email" id="" required>
    <input type="password" name="password" id="" required>
    <input type="submit" value="">
</form>