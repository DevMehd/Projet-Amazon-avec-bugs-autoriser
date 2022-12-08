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
            
            if (isset($_GET['product']) && !empty($_GET['product'])) {
                $id_product = htmlspecialchars($_GET['product']);
                
                $products = $db->prepare('SELECT * FROM products WHERE id = ?');
                $products->execute([$id_product]);
                $p = $products->fetch();
                $category = $db->prepare('SELECT name FROM categories WHERE id = ?');
                $category->execute([$p['category_id']]);
                $category = $category->fetch()['name'];
                $product_name = htmlspecialchars($p['title']);
                $product_price = htmlspecialchars($p['price']);
                $product_description = htmlspecialchars($p['description']);
                $product_date = htmlspecialchars($p['date_added']);

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

<form action="" method="post">
    <label for="name">Nom du produit</label>
    <input type="text" name="name" value="<?= $product_name ?>" id="name"><br>
    <label for="desc">Description</label>
    <textarea name="desc" id="desc" cols="30" rows="10"><?= $product_description ?></textarea><br>
    <label for="price">Prix</label>
    <input type="number" name="price" id="price" value="<?= $product_price ?>"><br>
    <input type="date" name="" id="" value="<?= $product_date ?>" disabled>
    <input type="submit" value="">
</form>