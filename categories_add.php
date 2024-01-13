<?php
require_once "helpers/functions.php";
require_once "database/db.php";
$page = "categories_add";








$errors = [];

if (isset($_POST['add_categorie'])) {

    $name = e($_POST['name']);
    $icon = e($_POST['icon']);

    if (empty($name)) {
        $input_name_validate_class = "is-invalid";
        $input_name_validate_message = "Le champ nom est requis";
        $errors[] = $input_name_validate_message;
    } else {
        if (!preg_match('/^[A-Za-z ]+$/', $name)) {
            $input_name_validate_class = "is-invalid";
            $input_name_validate_message = "Seul les charactéres alphabétiques sont autorisé";
            $errors[] = $input_name_validate_message;
        } else {
            if (strlen($name) < 3) {
                $input_name_validate_class = "is-invalid";
                $input_name_validate_message = "Veuillez saisir plus de 3 caractères";
                $errors[] = $input_name_validate_message;
            } else {
                $rows_category = $db->query("SELECT id FROM categories WHERE
                name = '$name' AND deleted_at IS NULL LIMIT 1")->rowCount();
                if ($rows_category === 1) {
                    $input_name_validate_class = "is-invalid";
                    $input_name_validate_message = $name . " déja pris";
                    $errors[] = $input_name_validate_message;
                } else {
                    $input_name_validate_class = "is-valid";
                }
            }
        }
    }





    if ($icon == '') {
        $input_icon_validate_class = "is-invalid";
        $input_icon_validate_message = "Le champ icon est requis";
        $errors[] = $input_icon_validate_message;
    } else {
        $input_icon_validate_class = "is-valid";
    }



    if (empty($errors)) {

        $db->query("INSERT INTO categories SET 
            name = '$name',
            icon = '$icon'
        ");

        $id = $db->lastInsertId();

        header("Location: categories.php?row_selected=$id");
        exit;
    }
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

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger" role="alert">
                <h3>Liste des erreurs</h3>
                <ul>
                    <?php foreach ($errors as $key => $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>





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
                                <input type="text" class="form-control <?= $input_name_validate_class ?? '' ?> " name="name" id="name" placeholder="Nom:" value="<?= $name ?? '' ?>">


                                <?php if (isset($input_name_validate_message)) : ?>
                                    <div class="invalid-feedback">
                                        <?= $input_name_validate_message ?? '' ?>
                                    </div>
                                <?php endif ?>



                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="icon" class="form-label">Icon:</label>


                                <input type="text" class="form-control <?= $input_icon_validate_class ?? '' ?> " name="icon" id="icon" placeholder="Nom:" value="<?= $icon ?? '' ?>">


                                <?php if (isset($input_icon_validate_message)) : ?>
                                    <div class="invalid-feedback">
                                        <?= $input_icon_validate_message ?? '' ?>
                                    </div>
                                <?php endif ?>
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