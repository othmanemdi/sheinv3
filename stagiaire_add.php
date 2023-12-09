<?php
require_once "database/db.php";
$page = "stagiaire_add";

if (isset($_POST['add_stagiaire'])) {

    // echo 'ok';
    // exit;
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $date_naissance = $_POST['date_naissance'];
    $genre = $_POST['genre'];

    $db->query("INSERT INTO stagiaires SET 
    prenom = '$prenom',
    nom = '$nom',
    date_naissance = '$date_naissance',
    genre = '$genre'
    ");

    header("Location: stagiaires.php");
    exit;
}


// echo "<pre>";
// print_r($_GET);
// echo "</pre>";




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

<body>
    <header>
        <?php include "body/nav.php" ?>
    </header>
    <main class="container mt-3">
        <h3>Ajouter un stagiaire</h3>



        <div class="card shadow">
            <div class="card-header">
                <h5>Ajouter un stagiaire</h3>
            </div>

            <div class="card-body">

                <form method="post">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom:</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="helpId" placeholder="Prénom:">

                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom:</label>
                                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" placeholder="Nom:">
                            </div>
                        </div>
                        <!-- col -->


                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="date_naissance" class="form-label">Date de naissance:</label>
                                <input type="date" class="form-control" name="date_naissance" id="date_naissance">
                            </div>
                        </div>
                        <!-- col -->

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-control" name="genre" id="genre">
                                    <option value="femme">Femme</option>
                                    <option value="homme">Homme</option>
                                </select>
                            </div>
                        </div>
                        <!-- col -->
                    </div>
                    <!-- row -->

                    <button class="btn btn-primary" name="add_stagiaire">Ajouter</button>
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