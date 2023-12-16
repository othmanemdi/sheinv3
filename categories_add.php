<?php
require_once "database/db.php";
$page = "categories_add";

if (isset($_POST['add_categorie'])) {

    $name = $_POST['name'];
    $icon = $_POST['icon'];

    $db->query("INSERT INTO categories SET 
    name = '$name',
    icon = '$icon'
    ");

    $id = $db->lastInsertId();

    header("Location: categories.php?row_selected=$id");
    exit;
}


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";




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
        <h3>Ajouter un categorie</h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Ajouter un categorie</h3>
            </div>

            <div class="card-body">

                <form method="post">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nom:">

                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon:</label>
                                <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon:">
                            </div>
                        </div>
                        <!-- col -->


                    </div>
                    <!-- row -->

                    <button class="btn btn-primary" name="add_categorie">Ajouter</button>
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