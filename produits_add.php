<?php
require_once "helpers/functions.php";
require_once "database/db.php";
$page = "produits_add";

if (isset($_POST['add_produit'])) {
    // https://www.w3schools.com/php/php_file_upload.asp

    $target_file = "images/" . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);


    $reference = $_POST['reference'];
    $designation = $_POST['designation'];
    $categorie = $_POST['categorie'];
    $couleur = $_POST['couleur'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $ancien_prix = $_POST['ancien_prix'];
    $image = $_FILES["image"]["name"];
    $description = $_POST['description'];


    $db->query("INSERT INTO produits SET 
    reference = '$reference',
    designation = '$designation',
    categorie = '$categorie',
    couleur = '$couleur',
    quantite = '$quantite',
    prix = '$prix',
    ancien_prix = '$ancien_prix',
    image = '$image',
    description = '$description'
    ");

    $id = $db->lastInsertId();
    header("Location: produits.php?row_selected=$id");
    exit;
}


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

$categories = $db->query("SELECT * FROM categories WHERE deleted_at IS NULL")->fetchAll();

$colors = $db->query("SELECT * FROM colors WHERE deleted_at IS NULL")->fetchAll();


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
        <h3>Ajouter un produit</h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Ajouter un produit</h3>
            </div>

            <div class="card-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="reference" class="form-label">Référence:</label>
                                <input type="text" class="form-control" name="reference" id="reference" placeholder="Référence:">
                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Désignation:</label>
                                <input type="text" class="form-control" name="designation" id="designation" placeholder="Désignation:">
                            </div>
                        </div>
                        <!-- col -->



                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="categorie" class="form-label">Catégories:</label>
                                <select class="form-select" name="categorie">
                                    <?php foreach ($categories as $key => $categorie) : ?>
                                        <option value="<?= $categorie->name ?>"><?= ucwords($categorie->name) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <!-- col -->



                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="couleur" class="form-label">Couleurs:</label>
                                <select class="form-select" name="couleur">
                                    <?php foreach ($colors as $key => $color) : ?>
                                        <option value="<?= $color->name ?>"><?= ucwords($color->name) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <!-- col -->




                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="quantite" class="form-label">Quantité:</label>
                                <input type="number" class="form-control" name="quantite" id="quantite" placeholder="Quantité:">
                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix:</label>
                                <input type="number" class="form-control" name="prix" id="prix" placeholder="Prix:">
                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="ancien_prix" class="form-label">Ancien Prix:</label>
                                <input type="number" class="form-control" name="ancien_prix" id="ancien_prix" placeholder="Ancien Prix:">
                            </div>
                        </div>
                        <!-- col -->



                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                        </div>
                        <!-- col -->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Description:"></textarea>
                            </div>
                        </div>
                        <!-- col -->


                    </div>
                    <!-- row -->

                    <button class="btn btn-primary" name="add_produit">Ajouter</button>
                </form>
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