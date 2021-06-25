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
    <title>Gallery</title>
</head>

<body>
    <div class="container-fluid sizeBody">
        <div class="row text-center sizeHeader align-items-center bg-light">
            <h1>Bienvenue <b><?= $_SESSION['firstname'] ?></b></h1>
        </div>
        <?php



        //On verifie si on est pas en Demo
        if ($_SESSION["formule"] != "Demo") {
            //On scanne se qu'il y a dans le dossier de la session
            $file = scandir('img/' . $_SESSION["id"]);
            //On parcours le dossier qu'on vien de scanner
            foreach ($file as $value) {
                //Verifie que le nom du fichier existe
                if (is_dir('img/' . $_SESSION["id"]) . $value) {
                    //On recupère le nom du fichier et si c'est . on continue
                    if (basename($value) == '.') continue;
                    //On recupère le nom du fichier et si c'est .. on continue
                    if (basename($value) == '..') continue;
                    //On recupère le nom du fichier et si c'est .DS_Store on continue
                    if (basename($value) == '.DS_Store') continue;
                    //On stock l'image dans un tableaux
                    $imgdir[] = 'img/' . $_SESSION["id"] . '/' . $value;
                }
            }
            //On est en Demo
        } else {
            //On scanne les images dans tous les dossiers
            $fileOne = scandir('img/001');
            $fileTwo = scandir('img/002');
            $fileThree = scandir('img/003');

            //On les stock dans le tableaux
            foreach($fileOne as $value){
                if (basename($value) == '.') continue;
                if (basename($value) == '..') continue;
                if (basename($value) == '.DS_Store') continue;
                $imgdir[] = 'img/001/' . $value;
            }
            foreach($fileTwo as $value){
                if (basename($value) == '.') continue;
                if (basename($value) == '..') continue;
                if (basename($value) == '.DS_Store') continue;
                $imgdir[] = 'img/002/' . $value;
            }
            foreach($fileThree as $value){
                if (basename($value) == '.') continue;
                if (basename($value) == '..') continue;
                if (basename($value) == '.DS_Store') continue;
                $imgdir[] = 'img/003/' . $value;
            }

        }
        

        //On regarde si il y a bien des images execepter le fichier (. et ..)
        if (!empty($imgdir)) { ?>
            
            <div class="row" data-masonry='{"percentPosition": true }'>
                <?php foreach ($imgdir as $value) { ?>
                    <div class="col-sm-6 col-lg-4 mb-4 mt-5">
                    <?php if($_SESSION["formule"] != "Demo") { ?>
                        <a href="image.php?image=<?= basename($value) ?>&size=<?= filesize($value) ?>&date=<?= strftime("%d %B %Y", filemtime($value)) ?> ">
                        <?php } ?>
                            <div class="card">
                                <img src="<?= $value ?>">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="row text-center sizeCardUser align-items-center fs-1">
                <span>Vous n'avez pas d'image dans votre dossier</span>
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