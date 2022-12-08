<?php
$pageTitle = "Admin login - Mon site.com";

ob_start();
?>

<!-- <form action="actions/admin_log.php" method="post">
    <input type="email" name="email" id="" required>
    <input type="password" name="password" id="" required>
    <input type="submit" value="">
</form> -->
<form action="actions/admin_log.php" method="POST">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Se connecter</h4>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-style" placeholder="Email" id="email" autocomplete="off" required>
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="password" class="form-style" placeholder="Mot de passe" id="password" autocomplete="off" required>
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <!-- <a href="actions/user_log.php" class="btn mt-4">Se connecter</a> -->
                                            <button type="submit" name="submit" value="submit" class="btn mt-4">Se connecter</a>
                                            <!-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p> -->
                                        </div>
                                    </form>