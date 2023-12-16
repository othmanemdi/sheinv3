<?php
require_once "database/db.php";
require_once "helpers/functions.php";
$page = "stagiaire_update";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $req = $db->query("SELECT * FROM stagiaires WHERE id = $id LIMIT 1");

    $rows_stagiaire = $req->rowCount();

    if ($rows_stagiaire == 0) {
        header("Location: stagiaires.php");
        exit;
    }

    if (isset($_POST['update_stagiaire'])) {

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $date_naissance = $_POST['date_naissance'];
        $genre = $_POST['genre'];

        $db->query("UPDATE stagiaires SET 
            prenom = '$prenom',
            nom = '$nom',
            date_naissance = '$date_naissance',
            genre = '$genre'
            WHERE id = $id
        ");
        $_SESSION['message'] = "Bien modifier";
        $_SESSION['color'] = "success";

        header("Location: stagiaires.php?row_selected=$id");
        exit;
    }

    // git reset --hard
    // git stash

    $stagiaire = $req->fetch();

    // echo "<pre>";
    // print_r($stagiaire);
    // echo "</pre>";
} else {
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
        <h3>Modifier les information de <?= $stagiaire->prenom ?></h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Modifier les information de <?= $stagiaire->prenom ?></h3>
            </div>

            <div class="card-body">

                <form method="post">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom:</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom:" value="<?= $stagiaire->prenom ?>">

                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom:</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom:" value="<?= $stagiaire->nom ?>">
                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="date_naissance" class="form-label">Date de naissance:</label>
                                <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="<?= $stagiaire->date_naissance ?>">
                            </div>
                        </div>
                        <!-- col -->



                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-control" name="genre" id="genre">
                                    <option value="femme" <?= $stagiaire->genre == 'femme'  ? 'selected' : '' ?>>Femme</option>

                                    <option value="homme" <?= $stagiaire->genre == 'homme'  ? 'selected' : '' ?>>Homme</option>
                                </select>
                            </div>
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->

                    <button type="submit" class="btn btn-dark" name="update_stagiaire">Modifier</button>

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