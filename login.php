<?php

session_start();

require_once("Helper/Database.class.php");
require_once("Model/User.class.php");

if (array_key_exists("password", $_POST) && array_key_exists("login", $_POST))
{
    // je tente de connecter l'utilisateur

    $userManager = new Model_User(); // Model/User.class.php

    $user=$userManager->verifLogin($_POST["login"], $_POST["password"]);
    if ($user != false)
    {
        $_SESSION["name"]=$user["name"];
        $_SESSION["id"]=$user["id"];
        $_SESSION["admin"]=$user["admin"];
         $_SESSION["error"]="";

// enregistrer les informations utilisateur en session
        // redirection sur la page d'accueil
        header("location: index.php");

    }
    else
    {
        $_SESSION["error"]="Mot de passe incorrect";
        header("location: index.php");
    }


}