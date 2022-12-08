<?php
require_once __DIR__ . "/../../init.php";
$pageTitle = "Connexion - Mon site.com";

// Commencer a ecrire dans la memoire tampon
ob_start();
?>

<section>
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Connexion</span><span>Inscription</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                    <form action="actions/user_log.php" method="POST">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Se connecter</h4>
                                            <div class="form-group">
                                                <input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="Mot de passe" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <!-- <a href="actions/user_log.php" class="btn mt-4">Se connecter</a> -->
                                            <button type="submit" name="submit" value="submit" class="btn mt-4">Se connecter</a>
                                            <!-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p> -->
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                    <form action="actions/user_register.php" method="POST">
                                        <div class="section text-center">
                                            <h4 class="mb-4 pb-3">Inscription</h4>
                                            <div class="form-group">
                                                <input type="text" name="logname" class="form-style" placeholder="Nom complet" id="logname" autocomplete="off">
                                                <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
                                                <i class="input-icon uil uil-at"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="logpass" class="form-style" placeholder="Mot de passe" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                                <input type="password" name="confirm_logpass" class="form-style" placeholder="Confirmer mot de passe" id="logpass" autocomplete="off">
                                                <i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <button type="submit" name="submit" value="submit" class="btn mt-4">S'inscire</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>