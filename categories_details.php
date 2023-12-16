<?php
require_once "database/db.php";
$page = "categories_details";


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $req = $db->query("SELECT * from categories WHERE id = $id LIMIT 1");

    $rows_categorie = $req->rowCount();

    if ($rows_categorie == 0) {
        header("Location: categories.php");
        exit;
    }

    $categorie = $req->fetch();

    // echo "<pre>";
    // print_r($categorie);
    // echo "</pre>";
} else {
    header("Location: categories.php");
    exit;
}



?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'body/header.php' ?>

</head>

<body>
    <header>
        <?php include "body/nav.php" ?>
    </header>
    <main class="container mt-3">
        <h3>Details de categorie</h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Details de categorie</h3>
            </div>

            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item">Nom: <?= $categorie->name ?></li>
                    <li class="list-group-item">
                        Icon:
                        <i class="bi bi-<?= $categorie->icon ?>"></i>
                    </li>
                </ul>

            </div>
            <!-- card-body -->
        </div>
        <!-- card -->

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>