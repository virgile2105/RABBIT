<?php
session_start();
require_once("Helper/Database.class.php");
require_once("Model/Posts.class.php");


$postsManager = new Model_Posts();

$posts=$postsManager->showPosts();


include"View/head.phtml";
include"View/home.phtml";
include"View/foot.phtml";