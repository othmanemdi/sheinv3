<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "shop";

$q = "";
if (isset($_GET['search'])) {
    $search = e($_GET['search']);
    if (empty($search)) {
        header('Location:shop.php');
        exit;
    }
    $q = " AND designation LIKE '%$search%' ";
}

$produits = $db->query("SELECT * FROM produits WHERE deleted_at IS NULL $q")->fetchAll();


$categories = $db->query("SELECT * FROM categories WHERE deleted_at IS NULL")->fetchAll();

$colors = $db->query("SELECT * FROM colors WHERE deleted_at IS NULL")->fetchAll();


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




                <form method="get">
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="<?= $search ?? '' ?>">
                        <button class="btn btn-dark" type="submit" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <?php if (isset($search)) : ?>
                    <div class="alert alert-info" role="alert">
                        Result of your serash by <?= $search ?? '' ?>
                    </div>
                <?php endif ?>


                <div class="row">
                    <?php foreach ($produits as $key => $p) : ?>

                        <div class="col-md-4">
                            <div class="card mb-2" data-aos="fade-up">
                                <a href="product_details.php?id=<?= $p->id ?>">
                                    <img class="card-img-top" src="images/produits/<?= $p->image ?>" alt="Title" height="280">
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title"><?= $p->designation ?></h6>

                                    <h6>
                                        <?= $p->prix ?>
                                        <s class="text-danger">
                                            <?= $p->ancien_prix ?>
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