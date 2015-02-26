<?php
session_start();
require_once("Helper/Database.class.php");
require_once("Model/Posts.class.php");


if (array_key_exists("changeTitle", $_POST)
    && array_key_exists("changeCaption", $_POST)
    && array_key_exists("changeCategory", $_POST)
    && array_key_exists("changeContent", $_POST)
)

{
    $postManager = new Model_Posts();
    $post=$postManager->getPost($_POST["postId"]);
    $image=$post['image_src'];


    for($i=0;$i<sizeof($_FILES['imageLoader']['name']);$i++)
    {
        if(!empty($_FILES['imageLoader']['name'][$i])){
        $imgName=uniqid()."_".$_FILES['imageLoader']['name'][$i];
        move_uploaded_file($_FILES['imageLoader']['tmp_name'][$i],'Assets/Img/Art/'.$imgName);

        $image.=$imgName.",";
        }
    }

    $modifyPost=$postManager->modifyPost($_POST["changeTitle"],$_POST["changeCaption"],$_POST["changeCategory"],$_POST["changeContent"],$image,$_POST["postId"]);

        var_dump($image);
        var_dump($_FILES);
        header("location: index.php");




}

else{
    $postsManager = new Model_Posts();

    $post=$postsManager->getPost($_GET["edit"]);
    include "View/edit.phtml";

}
