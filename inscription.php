<?php

session_start();

require_once("Helper/Database.class.php");
require_once("Model/User.class.php");


if (array_key_exists("createPassword", $_POST)
    && array_key_exists("createLogin", $_POST)
    && array_key_exists("createMail", $_POST)
)
{
    $userManager = new Model_User();

    $newUser=$userManager->createUser($_POST["createLogin"], $_POST["createPassword"], $_POST["createMail"]);
    if ($newUser != false)
    {
        $_SESSION["name"]=$_POST["createLogin"];
        $_SESSION["id"]=$newUser;
        $_SESSION["admin"]=0;
        $_SESSION["error"]="";

        header("location: index.php");

    }
    else
    {
        $_SESSION["error"]="Utilisateur non crée";
        header("location: index.php");
    }


}