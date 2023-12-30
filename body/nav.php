<?php
$stagiaires_pages = ['stagiaires', 'stagiaire_add', 'stagiaire_delete', 'stagiaire_details', 'stagiaire_update', 'stagiaires_archived', 'stagiaire_recover'];
$categories_pages = ['categories', 'categories_add', 'categories_details', 'categories_delete', 'categories_update'];

$produits_pages = ['produits', 'produits_add', 'produits_details', 'produits_delete', 'produits_update'];

$total_stagiaires = $db->query("SELECT COUNT(id) AS total FROM stagiaires WHERE deleted_at IS NULL LIMIT 1")->fetch()->total;
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Shein</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?= $page == "home" ? 'active text-info fw-bold' : '' ?>" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $page == "shop" ? 'active text-info fw-bold' : '' ?>" href="shop.php">Shop</a>
                </li>
                <!-- fw-bold text-info -->

                <li class="nav-item">
                    <a class="nav-link <?= $page == "cart" ? 'active text-info fw-bold' : '' ?>" href="cart.php">Cart</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link 
                    <?= in_array($page, $stagiaires_pages) ? 'active text-info fw-bold' : '-' ?>
                    " href="stagiaires.php">Stagiaires (<?= $total_stagiaires ?>)</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link 
                    <?= in_array($page, $categories_pages) ? 'active text-info fw-bold' : '-' ?>
                    " href="categories.php">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link 
                    <?= in_array($page, $produits_pages) ? 'active text-info fw-bold' : '-' ?>
                    " href="produits.php">Produits</a>
                </li>
            </ul>
        </div>
    </div>
</nav>