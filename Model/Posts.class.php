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
        $posts=$this->db->fetchAll("SELECT posts.*,users.name,users.avatar_src  FROM posts JOIN users ON posts.id_author=users.id");
        return $posts;
    }
    public function addPost($title,$category,$caption,$content,$image)
    {

        $addArticle=$this->db->create
        ("INSERT INTO posts (id_author,category, caption,content,title,image_src)
          VALUES (:id_author,:category,:caption,:content,:title,:images)"
            ,array('id_author'=>$_SESSION['id'],'category'=>$category,'caption'=>$caption,'content'=>$content,'title'=>$title,'images'=>$image));



        return $addArticle;
    }

}