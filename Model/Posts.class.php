<?php
class Model_Posts
{
    private $db;

    public function __construct()
    {
        $this->db = new Helper_Database();
    }

    public function showPosts()
    {
        $posts=$this->db->fetchAll("SELECT * FROM posts");
        return $posts;
    }


}