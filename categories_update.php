<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "categories_update";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $req = $db->query("SELECT * FROM categories WHERE id = $id LIMIT 1");

    $rows_categorie = $req->rowCount();

    if ($rows_categorie == 0) {
        header("Location: categories.php");
        exit;
    }

    if (isset($_POST['update_categorie'])) {

        $name = $_POST['name'];
        $icon = $_POST['icon'];


        $db->query("UPDATE categories SET 
            name = '$name',
            icon = '$icon'
            WHERE id = $id
        ");

        header("Location: categories.php?row_selected=$id");
        exit;
    }

    // git reset --hard
    // git stash

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
        <h3>Modifier les information de <?= $categorie->name ?></h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Modifier les information de <?= $categorie->name ?></h3>
            </div>

            <div class="card-body">

                <form method="post">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom:" value="<?= $categorie->name ?>">

                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon:</label>
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon:" value="<?= $categorie->icon ?>">
                            </div>
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->


                    <button type="submit" class="btn btn-dark" name="update_categorie">Modifier</button>

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