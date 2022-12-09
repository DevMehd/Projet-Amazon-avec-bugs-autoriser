<?php
$pageTitle = "Admin panel - Mon site.com";



ob_start();

if (isset($_COOKIE['id_temporaly_admin']) && !empty($_COOKIE['id_temporaly_admin'])) {
    $id_temp = htmlspecialchars($_COOKIE['id_temporaly_admin']);
    $verify_admin = $db->prepare('SELECT ip FROM admin WHERE temp_id = ?');
    $verify_admin->execute([$id_temp]);
    $verify_admin = $verify_admin->fetch();
    if ($verify_admin) {
        if ($verify_admin['ip'] == getIp()) {

            if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['desc']) && !empty($_POST['desc']) && isset($_POST['price']) && !empty($_POST['price'])) {
                $id = htmlspecialchars($_POST['id']);
                $name = htmlspecialchars($_POST['name']);
                $desc = htmlspecialchars($_POST['desc']);
                $price = htmlspecialchars($_POST['price']);
                $update = $db->prepare('UPDATE products SET title = ?, price = ?, description = ? WHERE products.id = ?');
                $update->execute([$name, $price, $desc, $id]);
                if (isset($_POST['promo'])) {
                    $up_promo = $db->prepare('UPDATE products SET  promo = ? WHERE products.id = ?');
                    $up_promo->execute([$_POST['promo']]);
                }
            }
            if (isset($_GET['product']) && !empty($_GET['product'])) {
                $id_product = htmlspecialchars($_GET['product']);
                
                $products = $db->prepare('SELECT * FROM products WHERE id = ?');
                $products->execute([$id_product]);
                $p = $products->fetch();
                if ($p) {
                    $category = $db->prepare('SELECT name FROM categories WHERE id = ?');
                    $category->execute([$p['category_id']]);
                    $category = $category->fetch()['name'];
                    $product_name = htmlspecialchars($p['title']);
                    $product_price = htmlspecialchars($p['price']);
                    $product_description = htmlspecialchars($p['description']);
                    $product_date = explode(" ", $p['date_added'])[0];
                }



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
?>

<p></p>
<form action="" method="POST">
    <div class="section text-center">
        <!-- <h4 class="mb-4 pb-3">Se connecter</h4> -->
        <div class="form-group">
            <input type="text" name="name" class="form-style" value="<?= $product_name ?>" id="name" autocomplete="off" required>
            <!-- <i class="input-icon uil uil-at"></i> -->
        </div>
        <div class="form-group mt-2">
            <textarea name="desc" class="form-style" id="desc" autocomplete="off" required><?= $product_description ?></textarea>
            <!-- <i class="input-icon uil uil-lock-alt"></i> -->
        </div>
        <div class="form-group mt-2">
            <input type="number" name="price" class="form-style" id="desc" autocomplete="off" required value="<?= $product_price ?>">
            
            <!-- <i class="input-icon uil uil-lock-alt"></i> -->
        </div>
        <div class="form-group mt-2">
            <label for="if_promo" id="label_promo" style="background-color: red;">Promo ?</label>
            <!-- <div class="input-group-text"> -->
                <input class="form-check-input form-check mt-0" type="checkbox" id="if_promo" name="if_promo" aria-label="Promo ?" style="visibility: hidden;">
            <!-- </div> -->
            <input type="text" class="form-style" aria-label="Text input with checkbox" id="promo" style="visibility:hidden;">
        </div>
        <div class="form-group mt-2">
            <input type="date" name="date" class="form-style" id="desc" autocomplete="off" required value="<?= $product_date ?>" disabled>
            <!-- <i class="input-icon uil uil-lock-alt"></i> -->
        </div>
        <input type="hidden" name="id" id="id" value="<?= $_GET['product'] ?>">
        <!-- <a href="actions/user_log.php" class="btn mt-4">Se connecter</a> -->
        <button type="submit" name="submit" value="submit" class="btn mt-4">Submit</button>
        <a class="btn btn-info" href="/admin/panel">Retour aux produits</a>
        <!-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p> -->
        <!-- Button trigger modal -->
    </div>
</form>

<script>
    if_promo = document.getElementById("if_promo")
    if_promo.addEventListener("change", function() {
        console.log(this)
        if (this.checked) {
            document.getElementById("promo").style.visibility = 'visible'
            document.getElementById("promo").style.backgroundColor = 'green'
            document.getElementById("label_promo").style.backgroundColor = 'green'
        } else {
            document.getElementById("promo").style.visibility = 'hidden'
            document.getElementById("label_promo").style.backgroundColor = 'red'
        }
    })
</script>