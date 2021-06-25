<?php
require 'login_validator.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid align-items-center ">
        <div class="row sizeHeader align-items-center bg-light text-center">
            <h1>Bienvenue</h1>
        </div>
        <div class="row d-flex flex-column align-items-center ">
            <form action="index.php" method="POST" class="col-4">
                <div class="col mt-5">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login :</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="john@gmail.com" value="<?= htmlspecialchars($_POST["login"] ?? '') ?>">
                        <span><?= VerifLogin('./assets/members.json') ?? '' ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <span><?= VerifPassword('./assets/members.json') ?? '' ?></span>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <input type="submit" name="submit" value="Connexion" >
                </div>
            </form>
        </div>
    </div>

</body>

</html>