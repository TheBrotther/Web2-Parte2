<?php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=gaspacho;charset=utf8', 'root', '');
    }
    
    public function getAllItems($nombreTabla) {
        $query = $this->db->prepare("SELECT * FROM $nombreTabla");
        $query->execute();
        $item = $query->fetchAll(PDO::FETCH_OBJ); 
        return $item;
    }
}