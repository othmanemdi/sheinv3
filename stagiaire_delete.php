<?php
require_once "database/db.php";
$page = "stagiaire_delete";


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $req = $db->query("SELECT * from stagiaires WHERE id = $id LIMIT 1");

    $rows_stagiaire = $req->rowCount();

    if ($rows_stagiaire == 0) {
        header("Location: stagiaires.php");
        exit;
    }

    $stagiaire = $req->fetch();

    // echo "<pre>";
    // print_r($stagiaire);
    // echo "</pre>";
} else {
    header("Location: stagiaires.php");
    exit;
}

if (isset($_POST['delete_stagiaire'])) {

    // $db->query("DELETE FROM stagiaires WHERE id = $id");
    $db->query("UPDATE stagiaires SET deleted_at = NOW() WHERE id = $id");
    header("Location: stagiaires.php");
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
        <h3>Delete stagiaire</h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Delete stagiaire</h3>
            </div>

            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item">Prenom: <?= $stagiaire->prenom ?></li>
                    <li class="list-group-item">Nom: <?= $stagiaire->nom ?></li>
                    <li class="list-group-item">Date de naissance: <?= $stagiaire->date_naissance ?></li>
                    <li class="list-group-item">Genre: <?= $stagiaire->genre ?></li>
                </ul>


                <h5 class="text-danger">Voulez vous vraiment supprimer <?= $stagiaire->prenom ?> <?= $stagiaire->nom ?> ?</h5>


                <form action="" method="post">
                    <a href="stagiaires.php" class="btn btn-secondary">Non</a>
                    <button class="btn btn-danger" name="delete_stagiaire">Oui</button>
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