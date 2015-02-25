<?php
session_start();

require_once("Helper/Database.class.php");
require_once("Model/Posts.class.php");


if (array_key_exists("delete", $_GET))
{
    $postManager = new Model_Posts();

    $delPost=$postManager->deletePost($_GET["delete"]);
    header("location: index.php");

    
}