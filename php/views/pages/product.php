<?php
$pageTitle = $_GET['slug'] . " - Mon site.com";

$error_message = get_error();

ob_start();
$data = $db->prepare("SELECT * FROM products WHERE slug = :slug_product");
$data->execute(
    [
        'slug_product' => $_GET['slug']
    ]
);
$data_slug = $data->fetchAll();

$data_2 = $db->prepare("SELECT * FROM categories as C INNER JOIN products as P WHERE c.id = p.category_id");
$data_2->execute();
$data_category = $data_2->fetchAll();
// var_dump($data_slug);
// echo" <pre>";
// print_r($data_category);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data_slug[0]['title'] ?> - Amazouz</title>
</head>

<body>

    <br><br>
    <h1 style="text-align: center;"><?php echo $data_slug[0]['title'] ?></h1>

    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4"><img id="main-image" src="https://placedog.net/200/200" width="250" /> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <a class="text-uppercase" href="./?p=allproducts"><span class="ml-1">Retour en arrière</span></a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $data_category[0]['name'] ?></span>
                                    <h5 class="text-uppercase"><?php echo $data_slug[0]['title'] ?></h5>
                                    <?php
                                    if ($data_slug[0]['promo']) {
                                    ?>
                                        <div class="price d-flex flex-row align-items-center"> <small class="text-muted text-decoration-line-through"><?php echo $data_slug[0]['price'] . "€"; ?></small> <span><?php $data_slug[0]['title'] . "%" ?></span></span>
                                        </div>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo $data_slug[0]['price'] . "€"; ?></span>
                                        </div>

                                    <?php } else { ?>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo $data_slug[0]['price'] . "€"; ?></span>
                                        <?php } ?>
                                        </div>
                                        <p class="about"><?php echo $data_slug[0]['description']; ?></p>
                                        <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Ajouter au panier</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>