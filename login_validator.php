<?php

function VerifPassword(string $json)
{
    $json_file = file_get_contents($json);
    $json_data = json_decode($json_file, true);

    if (isset($_POST["submit"])) {
        //On regarde que l'input est pas vide
        if (isset($_POST["password"]) && !empty($_POST["password"])) {
            $passwordIncorect = 0;
            //On parcours le json 
            foreach ($json_data["members"] as $value) {
                //On verifie que les password correspond bien
                if (password_verify($_POST["password"], $value["password"])) {
                    //On verifie que le mail correspond bien
                    if ($_POST["login"] == $value["mail"]) {
                        //On demarre la session
                        session_start();
                        //On stock les value dans les variable de session
                        $_SESSION["id"] = $value["id"];
                        $_SESSION["lastname"] = $value["lastname"];
                        $_SESSION["firstname"] = $value["firstname"];
                        $_SESSION["mail"] = $value["mail"];
                        $_SESSION["formule"] = $value["formule"];

                        //On regarde quelle formule on a et on stock la value dans une variable de session
                        if($value["formule"] == "Mouette"){
                            $_SESSION["totalSize"] = 5;
                        } else if($value["formule"] == "Goeland") {
                            $_SESSION["totalSize"] = 8;
                        } else if($value["formule"] == "Albatros"){
                            $_SESSION["totalSize"] = 20;
                        } else {
                            $_SESSION["totalSize"] = 0;
                        }
                        //On redirige vers la galerie
                        header("Location: gallery.php");
                    } 
                } else {
                    $passwordIncorect++;
                }
            }
            if($passwordIncorect > 3){
                echo 'Mot de passe eroné';
            }
        } else {
            return 'Champ obligatoire';
        }
    }
}


function VerifLogin(string $json)
{
    $json_file = file_get_contents($json);
    $json_data = json_decode($json_file, true);

    if (isset($_POST["submit"])) {
        if (isset($_POST["login"]) && !empty($_POST["login"])) {
            $loginIncorect = 0;
            foreach ($json_data["members"] as $value) {
                if ($_POST["login"] == $value["mail"]) {
                    echo '';
                } else {
                    $loginIncorect++;
                }
            }
            if($loginIncorect > 3){
                echo 'Login invalide';
            }
        } else {
            return 'Champ obligatoire';
        }
    }
}
