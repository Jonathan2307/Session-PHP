<?php

if (empty($_COOKIE)) {
    header("Location: ./index.php");
} else {
    session_start();
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
    <title>Image</title>
</head>

<body>
    <div class="container-fluid sizeBody">
        <div class="row text-center sizeHeader align-items-center bg-light">
            <h1>Bienvenue <b><?= $_SESSION['firstname'] ?></b></h1>
        </div>
        <?php



        if (!isset($_GET['image'])) {
            echo 'Veuillez selectionner une image';
        } else { ?>
            <div class="row mb-5 mt-5">
                <div class="col-xl-6 col-12">
                    <img class="sizeImg" src="<?= 'img/' . $_SESSION['id'] . '/' . $_GET['image'] ?>" alt="">
                </div>
                <div class="col-xl-6 col-12">
                    <div class="row text-center">
                        <div class="sizeImg">
                            <p>Taille de l'image : <?= round($_GET["size"] / 1000000, 2) ?> Mo</p>
                            <p>Date de l'upload : <?= $_GET["date"] ?></p>
                            <form action="delete.php?delete=<?= $_GET['image'] ?>" method="POST">
                            <input class="btn btn-danger" name="delete" type="submit" value="Supprimer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <footer class="row footer mt-auto fixed-bottom justify-content-around text-center sizeHeader align-items-center bg-light">
            <div class="col"><a href="./upload.php"><i class="bi bi-cloud-plus fs-1 "></i></div></a>
            <div class="col"><a href="./gallery.php"><i class="bi bi-house-fill fs-1"></i></div></a>
            <div class="col"><a href="./user.php"><i class="bi bi-person fs-1"></i></div></a>
            <div class="col"><a href="./disconnect.php"><i class="bi bi-door-open-fill fs-1"></i></div></a>
        </footer>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

</body>

</html>