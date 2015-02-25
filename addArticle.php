<?php
include"View/addArticle.phtml";
session_start();

require_once("Helper/Database.class.php");
require_once("Model/Posts.class.php");

if (array_key_exists("newTitle", $_POST)
    && array_key_exists("newCaption", $_POST)
    && array_key_exists("newCat", $_POST)
    && array_key_exists("newContent", $_POST)
)

{
    $postManager = new Model_Posts();
    $image="";

    for($i=0;$i<sizeof($_FILES['imageLoader']['name']);$i++)
    {
        move_uploaded_file($_FILES['imageLoader']['tmp_name'][$i],'Assets/Img/Art'.uniqid()."_".$_FILES['imageLoader']['name'][$i]);

        $image.=$_FILES['imageLoader']['name'][$i].",";

    }

    $newPost=$postManager->addPost($_POST["newTitle"], $_POST["newCaption"], $_POST["newCat"], $_POST["newContent"],$image);

    if ($newPost != false)
    {

        var_dump($_FILES);
    }
    else
    {
        echo('rien ne se passe');
    }


}