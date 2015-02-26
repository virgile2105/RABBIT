<?php
session_start();
require_once("Helper/Database.class.php");
require_once("Model/Posts.class.php");

$postsManager = new Model_Posts();

$remImg=$postsManager->remImg($_POST["name"],$_POST["id"]);
