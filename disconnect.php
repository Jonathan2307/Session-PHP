<?php

session_start();

//On supprime les variable
$_SESSION = array();

//On detruit les cookie de la session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

//On detruit la session
session_destroy();

//On redirige vers l'accueil
header("Location: index.php");

?>