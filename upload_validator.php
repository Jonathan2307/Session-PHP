<?php

function VerifUpload()
{
    $extensions = [
        "image/png",
        "image/jpeg",
        "image/jpg",
        "image/gif"
    ];

    if (isset($_POST["submit"])) {
        //On verifie qu'il n'y pas d'erreur et que le fichiers est present
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
            //On recupèere le type du fichers
            $typeFile = mime_content_type(strtolower($_FILES['file']['tmp_name']));
            //On recupère l'extension de l'image
            $extension = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
            //On verifie que c'est bien une image
            if (in_array($typeFile, $extensions)) {
                //On regarde la formule de l'utilisateur
                if ($_SESSION["formule"] == "Mouette") {
                    //On verifie la taille de l'upload
                    if ($_FILES["file"]["size"] <= 5000000) {
                        //On verifie que la taille du fichiers plus la taille du dossiers depasse pas la limite autoriser
                        if ($_FILES["file"]["size"] + TailleDossier("img/" . $_SESSION["id"]) < 5000000) {
                            //On verifie que le fichiers a été upload
                            if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
                                //On cree un unique id avec comme prefix l'id de l'utilisateur
                                $name = uniqid($_SESSION["id"]);
                                //On deplace le fichiers vers le dossier correspondant a l'utilisateur
                                move_uploaded_file($_FILES["file"]["tmp_name"],   "img/" . $_SESSION["id"] . "/$name.$extension");
                                header("Refresh: 0");
                            }
                        } else {
                            return 'Quota atteint supprimez des image ou passez à la formule supérieur';
                        }
                    } else {
                        return 'Votre fichiers est trop lourd limite de 5mo';
                    }
                } else if ($_SESSION["formule"] == "Goeland") {
                    if ($_FILES["file"]["size"] <= 8000000) {
                        if ($_FILES["file"]["size"] + TailleDossier("img/" . $_SESSION["id"]) < 5000000) {
                            if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
                                $name = uniqid($_SESSION["id"]);
                                move_uploaded_file($_FILES["file"]["tmp_name"],   "img/" . $_SESSION["id"] . "/$name.$extension");
                                header("Refresh: 0");
                            }
                        } else {
                            return 'Quota atteint supprimez des image ou passez à la formule supérieur';
                        }
                    } else {
                        return 'Votre fichiers est trop lourd limite de 5mo';
                    }
                } else if ($_SESSION["formule"] == "Albatros") {
                    if ($_FILES["file"]["size"] <= 20000000) {
                        if ($_FILES["file"]["size"] + TailleDossier("img/" . $_SESSION["id"]) < 5000000) {
                            if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
                                $name = uniqid($_SESSION["id"]);
                                move_uploaded_file($_FILES["file"]["tmp_name"],   "img/" . $_SESSION["id"] . "/$name.$extension");
                                header("Refresh: 0");
                            }
                        } else {
                            return 'Quota atteint supprimez des image ou passez à la formule supérieur';
                        }
                    } else {
                        return 'Votre fichiers est trop lourd limite de 5mo';
                    }
                } else {
                    $_FILES["file"]["size"] = 0;
                    return 'Vous etes en DEMO';
                }
            } else {
                return 'Votre fichier n\'est pas une image';
            }
        } else {
            return 'Choissiez un fichier image';
        }
    }
}

function TailleDossier($Rep)
{
    $Racine = opendir($Rep);
    $Taille = 0;
    while ($Dossier = readdir($Racine)) {
        if ($Dossier != '..' and $Dossier != '.') {
            //Ajoute la taille du sous dossier
            if (is_dir($Rep . '/' . $Dossier)) $Taille += TailleDossier($Rep . '/' . $Dossier);
            //Ajoute la taille du fichier
            else $Taille += filesize($Rep . '/' . $Dossier);
        }
    }

    closedir($Racine);

    return $Taille;
}
