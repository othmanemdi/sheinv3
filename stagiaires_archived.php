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






$stagiaires = $db->query("SELECT * FROM stagiaires WHERE deleted_at IS NOT NULL ORDER BY id DESC")->fetchAll();



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
        <h3>Stagiaires archivés</h3>





        <div class="card shadow">
            <div class="card-header">
                <h5>Liste des stagiaires qui sont archivés</h3>
            </div>

            <div class="card-body">


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


                                        <a href="stagiaire_recover.php?id=<?= $value->id ?>" class="btn btn-success btn-sm">Récupérer</a>
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