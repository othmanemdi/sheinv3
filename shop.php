<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "shop";

$categories = $db->query("SELECT * FROM categories WHERE deleted_at IS NULL")->fetchAll();



$colors = $db->query("SELECT * FROM colors WHERE deleted_at IS NULL")->fetchAll();


$products = [
    1 => [
        "image" => "1.jpg",
        "name" => "",
        "description" => "",
        "price" => "",
        "old_price" => "",
        "quantity" => "",
        "color_name" => "",
        "category_name" => "",
    ],
];

$products = [
    1 => [
        "image" => "1.jpg",
        "name" => "Iphone 13 Pro Max",
        "category_name" => "Iphone",
        "color_name" => "Blue",
        "price" => 18000,
        "old_price" => 18500,
        "quantity" => 10
    ],

    2 => [
        "image" => "2.jpg",
        "name" => "Imac 24 pouce M2",
        "category_name" => "Macbook",
        "color_name" => "Orange",
        "price" => 24000,
        "old_price" => 24500,
        "quantity" => 20
    ],

    3 => [
        "image" => "3.jpg",
        "name" => "Imac 27 pouce M2",
        "category_name" => "Imac",
        "color_name" => "green",
        "price" => 28000,
        "old_price" => 28500,
        "quantity" => 30
    ],

    4 => [
        "image" => "4.jpg",
        "name" => "Macbook M2",
        "category_name" => "Macbook",
        "color_name" => "gray",
        "price" => 18000,
        "old_price" => 18500,
        "quantity" => 50
    ],

    5 => [
        "image" => "5.jpg",
        "name" => "Macbook Pro Max M2 ",
        "category_name" => "Macbook",
        "color_name" => "Orange",
        "price" => 30000,
        "old_price" => 30500,
        "quantity" => 45
    ],
];


// echo '<pre>';
// print_r($products);
// echo '</pre>';
// exit;


// for ($i = 1; $i <= count($categories); $i++) {
//     echo  $categories[$i];
//     echo "<br>";
// }



// foreach ($categories as $key => $value) {
//     echo $value;
//     echo " - ";
//     echo $key;
//     echo "<br>";
// }


// exit;

// exit;
// echo '<pre>';
// echo print_r($categories);
// echo '</pre>';
// exit;
?>


<!doctype html>
<html lang="en">

<head>
    <?php include 'body/header.php' ?>

    <style>
        .pointer {
            cursor: pointer;
        }
    </style>

</head>

<body>
    <header>
        <?php include "body/nav.php" ?>
    </header>
    <main class="container mt-3">
        <h3>Shop Page</h3>

        <div class="row">
            <div class="col-md-3">
                <h5>Categories: </h5>

                <ul class="list-group list-group-flush mb-3">
                    <?php foreach ($categories as $key => $c) : ?>

                        <li class="list-group-item  p-1">
                            <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="<?= $c->name ?>">

                            <label class="form-check-label" for="<?= $c->name ?>">
                                <i class="bi bi-<?= $c->icon ?>"></i>
                                <?= ucwords($c->name) ?>
                            </label>
                        </li>
                    <?php endforeach ?>

                </ul>



                <h5>Colors: </h5>

                <ul class="list-group list-group-flush mb-3">
                    <?php foreach ($colors as $key => $color) : ?>
                        <li class="list-group-item p-1">
                            <i class="bi bi-circle-fill" style="color:<?= $color->hex_color ?>;font-size:16px"></i>
                            <?= ucwords($color->name) ?>
                        </li>
                    <?php endforeach ?>
                </ul>

                <!-- 
                <ul class="list-group list-group-flush ">

                    <li class="list-group-item ">
                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="" id="radioid">
                        <label class="form-check-label pointer" for="radioid">
                            Item
                        </label>
                    </li>
                </ul>
                
                -->

            </div>
            <!-- col -->

            <div class="col-md-9">

                <div class="row">
                    <?php foreach ($products as $key => $p) : ?>

                        <div class="col-md-4">
                            <div class="card mb-2" data-aos="fade-up">
                                <img class="card-img-top" src="images/<?= $p['image'] ?>" alt="Title" height="280">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $p['name'] ?></h6>

                                    <h6>
                                        <?= $p['price'] ?>
                                        <s class="text-danger">
                                            <?= $p['old_price'] ?>
                                        </s>
                                    </h6>

                                    <a href="" class="btn btn-dark fw-bold btn-sm">
                                        <i class="bi bi-cart-fill"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col 2 -->

                    <?php endforeach ?>


                    <?php foreach ($products as $key => $p) : ?>

                        <div class="col-md-4">
                            <div class="card mb-2" data-aos="fade-up">
                                <img class="card-img-top" src="images/<?= $p['image'] ?>" alt="Title" height="280">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $p['name'] ?></h6>

                                    <h6>
                                        <?= $p['price'] ?>
                                        <s class="text-danger">
                                            <?= $p['old_price'] ?>
                                        </s>
                                    </h6>

                                    <a href="" class="btn btn-dark fw-bold btn-sm">
                                        <i class="bi bi-cart-fill"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col 2 -->

                    <?php endforeach ?>


                    <?php foreach ($products as $key => $p) : ?>

                        <div class="col-md-4">
                            <div class="card mb-2" data-aos="fade-up">
                                <img class="card-img-top" src="images/<?= $p['image'] ?>" alt="Title" height="280">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $p['name'] ?></h6>

                                    <h6>
                                        <?= $p['price'] ?>
                                        <s class="text-danger">
                                            <?= $p['old_price'] ?>
                                        </s>
                                    </h6>

                                    <a href="" class="btn btn-dark fw-bold btn-sm">
                                        <i class="bi bi-cart-fill"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col 2 -->

                    <?php endforeach ?>


                    <?php foreach ($products as $key => $p) : ?>

                        <div class="col-md-4">
                            <div class="card mb-2" data-aos="fade-up">
                                <img class="card-img-top" src="images/<?= $p['image'] ?>" alt="Title" height="280">
                                <div class="card-body">
                                    <h6 class="card-title"><?= $p['name'] ?></h6>

                                    <h6>
                                        <?= $p['price'] ?>
                                        <s class="text-danger">
                                            <?= $p['old_price'] ?>
                                        </s>
                                    </h6>

                                    <a href="" class="btn btn-dark fw-bold btn-sm">
                                        <i class="bi bi-cart-fill"></i>
                                        Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col 2 -->

                    <?php endforeach ?>

                </div>
                <!-- row 2 -->


            </div>
            <!-- col -->

        </div>
        <!-- row -->
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>