<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "stagiaires";
$row_selected = 0;

if (isset($_GET['row_selected'])) {
    $row_selected = (int)$_GET['row_selected'];
}



// $fruits = ['banane', 'pomme', 'orange', 'ananas'];

// $fruit = 'banane';

// var_dump(in_array($fruit, $fruits));

// exit;






$stagiaires = $db->query("SELECT * FROM stagiaires ORDER BY id DESC")->fetchAll();



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
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<!-- git reset --HARD -->

<body>
    <header>
        <?php include "body/nav.php" ?>
    </header>
    <main class="container mt-3">
        <h3>Stagiaires Page</h3>





        <div class="card shadow">
            <div class="card-header">
                <h5>Liste des stagiaires</h3>
            </div>

            <div class="card-body">

                <a href="stagiaire_add.php" class="btn btn-primary mb-3 ">Ajouter</a>


                <div class="table-responsive">
                    <table class="table">
                        <theade>
                            <tr class="table-light">
                                <th>Id</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Date de naissance</th>
                                <th>Genre</th>
                                <th>Actions</th>
                            </tr>
                        </theade>
                        <tbody>
                            <?php foreach ($stagiaires as $key => $value) : ?>
                                <tr class="<?= $value->id == $row_selected ? 'table-primary' : '' ?>">
                                    <td>
                                        <?= $value->id ?>
                                    </td>
                                    <td><?= $value->prenom ?></td>
                                    <td><?= $value->nom ?></td>
                                    <td><?= $value->date_naissance ?></td>
                                    <td>

                                        <span class="badge rounded-pill text-bg-<?= $value->genre == 'femme' ? 'danger' : 'primary' ?>">
                                            <?= $value->genre == 'femme' ? 'FE' : 'HO' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="stagiaire_details.php?id=<?= $value->id ?>" class="btn btn-secondary btn-sm">Afficher</a>

                                        <a href="stagiaire_update.php?id=<?= $value->id ?>" class="btn btn-dark btn-sm">Modifier</a>

                                        <a href="stagiaire_delete.php?id=<?= $value->id ?>" class="btn btn-danger btn-sm">Supprimer</a>
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