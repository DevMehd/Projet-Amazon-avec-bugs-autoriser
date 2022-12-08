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

            $categories = $db->prepare('SELECT * FROM categories');
            $categories->execute();
            $categories = $categories->fetchAll();
            
            $products = $db->prepare('SELECT * FROM products');
            $products->execute();
            ?>
            <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            while($p = $products->fetch()){
                $product_name = htmlspecialchars($p['title']);
                $product_price = htmlspecialchars($p['price']);
                $product_description = htmlspecialchars($p['description']);
                $product_date = htmlspecialchars($p['date_added']);
                $cat_id = $p['category_id'];
                $category = ($categories[$cat_id-1]['name']);
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $product_name ?></h5>
                                $<?= $product_price ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/admin/edit/product/<?= $p['id'] ?>">Modifier</a></div>
                        </div>
                    </div>
                </div>
                
                <?php
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
</div>
    </div>
</section>