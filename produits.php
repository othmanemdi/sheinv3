<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "produits";
$row_selected = 0;

if (isset($_GET['row_selected'])) {
    $row_selected = (int)$_GET['row_selected'];
}


$produits = $db->query("SELECT * FROM produits WHERE deleted_at IS NULL ORDER BY id DESC")->fetchAll();



// $_GET;
// $_POST;
// $_COOKIE;
// $_SESSION;
// $_FILES;
// $_SERVER;

?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'body/header.php' ?>

</head>

<!-- git reset --HARD -->

<body>
    <header>
        <?php include "body/nav.php" ?>
    </header>
    <main class="container mt-3">
        <h3>Produits Page</h3>

        <div class="card shadow">
            <div class="card-header">
                <h5>Liste des produits</h3>
            </div>

            <div class="card-body">

                <a href="produits_add.php" class="btn btn-primary mb-3 ">Ajouter</a>


                <div class="table-responsive">
                    <table class="table">
                        <theade>
                            <tr class="table-light">
                                <th>Id</th>
                                <th>Image</th>
                                <th>Référence</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                        </theade>
                        <tbody>
                            <?php foreach ($produits as $key => $value) : ?>
                                <tr class="<?= $value->id == $row_selected ? 'table-primary' : '' ?>">
                                    <td>
                                        <?= $value->id ?>
                                    </td>
                                    <td>
                                        <img width="30" src="images/produits/<?= $value->image ?>" alt="">
                                    </td>
                                    <td><?= $value->reference ?></td>

                                    <td><?= $value->quantite ?></td>
                                    <td><?= $value->prix ?></td>

                                    <td>
                                        <a href="produits_details.php?id=<?= $value->id ?>" class="btn btn-secondary btn-sm">Afficher</a>

                                        <a href="produits_update.php?id=<?= $value->id ?>" class="btn btn-dark btn-sm">Modifier</a>

                                        <a href="produits_delete.php?id=<?= $value->id ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- responsive -->
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