<?php
class Model_User
{
    private $db;

    public function __construct()
    {
        $this->db = new Helper_Database();
    }

    public function verifLogin($login, $password)
    {

        $user = $this->db->fetch("SELECT * FROM users WHERE name = :login OR mail=:login", array("login" => $login));

        if ($user["password"] == $password) {
            return ($user);
        }
        else {

            return false;

        }
    }

    public function createUser($login, $password, $mail)
    {
        $newUser = $this->db->create
                    ("INSERT INTO USERS (name, password, mail)
                      VALUES (:name , :password , :mail)"
                    ,array("name"=>$login,"password"=>$password,"mail"=>$mail));

        return $newUser;

    }

}