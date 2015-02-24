<?php
Class Helper_Database
{
    // propriétés

    private $db;

    // methodes

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=rabbit","root","troiswa");
    }

    public function fetchAll($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function fetch($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetch(PDO::FETCH_ASSOC);

        return $res;
    }
    public function create($query, $data= array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        return $this->db->lastInsertId();
    }

}


//$db = new Helper_Database("mysql:host=127.0.0.1;dbname=minichat", "root", "troiswa");
//$messages = $db->fetchAll("SELECT * FROM message WHERE user = :id", array("id" => 2));
