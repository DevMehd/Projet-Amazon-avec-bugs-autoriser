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
            <input type="date" name="date" class="form-style" id="desc" autocomplete="off" required value="<?= $product_date ?>" disabled>
            <!-- <i class="input-icon uil uil-lock-alt"></i> -->
        </div>
        <input type="hidden" name="id" id="id" value="<?= $_GET['product'] ?>">
        <!-- <a href="actions/user_log.php" class="btn mt-4">Se connecter</a> -->
        <button type="submit" name="submit" value="submit" class="btn mt-4">Submit</a>
        <!-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p> -->
        <!-- Button trigger modal -->
    </div>
</form>