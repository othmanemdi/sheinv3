<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "product_details";


if (!isset($_GET['id'])) {
    header('Location:shop.php');
    exit;
}

$id = (int)$_GET['id'];


$p = $db->query("SELECT * FROM produits WHERE deleted_at IS NULL and id = $id limit 1")->fetch();

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
        <h2 class="my-3">Product Details</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>
                <li class="breadcrumb-item active">Product Details</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6">
                <img src="images/produits/<?= $p->image ?>" width="400" class="img-fluid" alt="">
            </div>
            <!-- col -->
            <div class="col-md-6">
                <h4><?= $p->designation ?></h4>

                <div class="text-warning">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>

                <p class="my-2">
                    <?= $p->description ?>
                </p>


                <form class="mt-3">
                    <div class="row">
                        <div class="col">
                            <label for="size">Size</label>
                            <select class="form-select" id="size">
                                <option selected>Select your size</option>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                                <option value="4">XL</option>
                            </select>
                        </div>
                        <!-- col -->

                        <div class="col">
                            <label for="color">Color</label>
                            <select class="form-select" id="color">
                                <option selected>Select your color</option>
                                <option value="1">Black</option>
                                <option value="2">Blue</option>
                                <option value="3">Red</option>
                                <option value="4">Yellow</option>
                            </select>
                        </div>
                        <!-- col -->

                    </div>
                    <!-- row -->



                    <h4 class="my-3 fw-bold">
                        <?= $p->prix ?> DH
                        <del class="text-danger"><?= $p->ancien_prix ?> DH</del>
                    </h4>

                    <a href="cart.html" class="btn btn-dark fw-bold">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Add To Cart
                    </a>

                </form>

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