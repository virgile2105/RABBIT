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

    public function deletePost($post)
    {
       $this->db->delete
        ("DELETE FROM posts WHERE id=:id LIMIT 1"
        ,array('id'=>$post));


    }

    public function getPost($select)
    {
        $getPost=$this->db->fetch
        ("SELECT * FROM posts WHERE id=:id LIMIT 1"
            ,array('id'=>$select));

        return $getPost;
    }

    public function remImg($name,$id)
    {
       $this->db->update
        ("UPDATE posts SET image_src=:name WHERE id=:id LIMIT 1"
            ,array('id'=>$id,'name'=>$name));


    }
    public function modifyPost($title,$caption,$category,$content,$image,$id)
    {
        $modPost=$this->db->update
        ("UPDATE posts SET caption=:caption,content=:content,image_src=:image,title=:title,category=:category
          WHERE id=:id LIMIT 1"
            ,array('id'=>$id,'title'=>$title,'caption'=>$caption,"category"=>$category,"content"=>$content,"image"=>$image));

        return $modPost;
    }


}