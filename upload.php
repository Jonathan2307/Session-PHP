<?php

if (empty($_COOKIE)) {
    header("Location: ./index.php");
} else {
    session_start();
    require 'upload_validator.php';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Upload</title>
</head>

<body>
    <div class="container-fluid sizeBody">
        <div class="row text-center sizeHeader align-items-center bg-light">
            <h1>Téléchargez vos images ici !</h1>
        </div>
        <div class="row text-center">
            <p>Formule : <?= $_SESSION["formule"] ?></p>
            <p>Quota : <?= round(TailleDossier('img/' . $_SESSION["id"]) / 1000000, 2)  ?> Mo / <?= $_SESSION["totalSize"] ?> Mo</p>
        </div>
        <div class="row text-center align-items-center justify-content-center">
            <img id="imgPreview">
            <form action="upload.php" enctype="multipart/form-data" method="post">
                <label for="file" class="myLabel mb-3" id='hide'>Veuillez choisir une image :</label>
                <input type="file" name="file" id="file" class="mt-3">
                <div class="row mt-2 d-flex flex-column">
                    <div class="col">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary mt-3" value="Envoyer">
                    </div>
                    <div class="col mt-3">
                        <span class="errorMessage"><?= VerifUpload() ?? '' ?></span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="row footer mt-auto fixed-bottom justify-content-around text-center sizeHeader align-items-center bg-light">
        <div class="col"><a href="./upload.php"><i class="bi bi-cloud-plus fs-1 "></i></div></a>
        <div class="col"><a href="./gallery.php"><i class="bi bi-house-fill fs-1"></i></div></a>
        <div class="col"><a href="./user.php"><i class="bi bi-person fs-1"></i></div></a>
        <div class="col"><a href="./disconnect.php"><i class="bi bi-door-open-fill fs-1"></i></div></a>
    </footer>
    <script src="assets/script.js"></script>
</body>

</html>