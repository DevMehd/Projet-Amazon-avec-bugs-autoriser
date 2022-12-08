<?php
require_once __DIR__ . "/../../init.php";
$pageTitle = "Nos produits - Mon site.com";

// Commencer a ecrire dans la memoire tampon
ob_start();

$data_1 = $db->prepare("SELECT * FROM products");
$data_1->execute();
$data_prod = $data_1->fetchAll();

// $data_2 = $db->prepare("SELECT COUNT(id) AS c, id, product_id, SUM(rating) AS rating FROM reviews GROUP BY product_id");
$data_2 = $db->prepare("SELECT * FROM reviews");
$data_2->execute();
$data_rating = $data_2->fetchAll();
// var_dump($data_rating);
// echo "<pre>";
// print_r($data_rating);
// echo "</pre>";
?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($data_prod as $products) {
                $sum = 0;
                $i = 0;
            ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <?php if ($products['promo']) { ?>
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promotion</div>
                        <?php } ?>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">
                                    <?php echo $products['title']; ?>
                                </h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <?php
                                    $i = 0;
                                    $res = 0;
                                    $count = 0;
                                    foreach ($data_rating as $rating) {
                                        if ($rating['product_id'] === $products['id']) {
                                            $sum = $sum + $rating['rating'];
                                            $i = $i + 1;
                                        }
                                    }
                                    if ($i > 0) {
                                        $res = $sum / $i;
                                    }
                                    for ($i = 0; $i < 5; $i = $i + 1) {
                                        if ($i < $res) {
                                    ?>
                                            <div class="bi-star-fill"></div>
                                        <?php
                                        $count = $count + 1;
                                        } else { ?>
                                            <div class="bi-star"></div>
                                    <?php }
                                    } ?>
                                    <?php echo " --(".$count." evaluation)";?>
                                </div>
                                <!-- Product price-->
                                <?php if ($products['promo']) { ?>
                                    <span class="text-muted text-decoration-line-through">
                                        <?php echo number_format($products['price'], 2, ',', ' ') . "€";
                                        // $prix_promo = round(($products['price'] -  ($products['price'] * ($products['promo'] / 100))), 2);
                                        ?></span>
                                <?php }
                                $prix_promo = round(($products['price'] -  ($products['price'] * ($products['promo'] / 100))), 2);
                                // $prix_promo = floor(($products['price'] -  ($products['price'] * ($products['promo'] / 100))) * 2 / 2);
                                echo number_format($prix_promo, 2, ',', ' ') . "€"; ?>
                            </div>
                            <!-- number_format($res, 2, ",", " ") -->
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ajouter au panier</a></div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>