<?php


if (empty($_COOKIE)) {
    header("Location: ./index.php");
} else {
    session_start();
    require 'upload_validator.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/style.css">

    <title>User infos</title>
</head>

<body>
    <div class="container-fluid d-flex flex-column">
        <div class="row text-center sizeHeader align-items-center bg-light">
            <h1>Vos Infos</h1>
        </div>
        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="p-3">
                <h2 class="display-5"><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></h2>
            </div>
            <div class="bg-dark shadow-sm mx-auto sizeInfo">
                <div class="pt-5 fs-5 text-light"><?= $_SESSION['mail'] ?></div>
                <div class="fs-5 text-light"><b>Formule :</b> <?= $_SESSION['formule'] ?></div>
                <p class=" fs-5 text-light"><b>Quota : </b><?= round(TailleDossier('img/' . $_SESSION["id"]) / 1000000, 2)  ?> Mo / <?= $_SESSION["totalSize"] ?> Mo</p>
            </div>
        </div>
    </div>
    <footer class="row footer mt-auto fixed-bottom justify-content-around text-center sizeHeader align-items-center bg-light">
        <div class="col">
            <a href="./upload.php"><i class="bi bi-cloud-plus fs-1 "></i></a>
        </div>
        <div class="col">
            <a href="./gallery.php"><i class="bi bi-house-fill fs-1"></i></a>
        </div>
        <div class="col">
            <a href="./user.php"><i class="bi bi-person fs-1"></i></a>
        </div>
        <div class="col">
            <a href="./disconnect.php"><i class="bi bi-door-open-fill fs-1"></i></a>
        </div>
    </footer>
</body>

</html>