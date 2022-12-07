<p class="logout_message">
    Vous avez bien été déconnecté. Merci pour votre visite !
</p>
<p class="logout_message">
    Cliquez <a href="./index.php">ici</a> pour être rediriger vers la page d'accueil dans quelques secondes.
</p>
</section>

<?php
session_unset();
session_destroy();

header("Refresh:1; url=./");
?>