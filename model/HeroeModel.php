<?php
require_once "Model.php";

class HeroeModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    function getHeroeById($id_heroe){
        $sentencia = $this->db->prepare("SELECT * FROM heroe WHERE id_heroe = ?");
        $sentencia->execute(array($id_heroe));
        $objeto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $objeto;
    }

    function getHeroes(){
        $sentencia = $this->db->prepare("SELECT * FROM heroe ORDER BY id_heroe DESC");
        $sentencia->execute(array());
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
     }

    public function getHeroesByAtributo($id_atributo){
        $sentencia = $this->db->prepare("SELECT * FROM heroe WHERE id_atributo_fk = ?");
        $sentencia->execute(array($id_atributo));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function editarHeroe($id_heroe, $nombre, $type_atack, $descripcion){
        $sentencia = $this->db->prepare("   UPDATE 
                                                `heroe` 
                                            SET 
                                                `nombre`=?,
                                                `type_atack`=?,
                                                `descripcion`=? 
                                            WHERE 
                                                `id_heroe`=?");
        $sentencia->execute(array($nombre, $type_atack, $descripcion, $id_heroe));
    }

    public function heroesByOrdenAsc($col){
        $query = $this->db->prepare("SELECT * FROM heroe ORDER BY $col ASC");
        $query->execute();
        $heroes = $query->fetchall(PDO::FETCH_OBJ);
        return $heroes;
    }

    public function heroesByOrdenDesc($col){
        $query = $this->db->prepare("SELECT * FROM heroe ORDER BY $col DESC");
        $query->execute();
        $heroes = $query->fetchall(PDO::FETCH_OBJ);
        return $heroes;
    }

    public function borrarHeroe($id_heroe){
        $sentencia = $this->db->prepare("DELETE FROM heroe WHERE id_heroe=?");
        $sentencia->execute(array($id_heroe));
    }

    public function agregarHeroe($nombre, $type_atack, $id_atributo_fk, $descripcion){
        $sentencia= $this->db->prepare("INSERT INTO heroe(nombre, type_atack, id_atributo_fk, descripcion) VALUE(?,?,?,?)");
        $sentencia->execute(array($nombre, $type_atack, $id_atributo_fk, $descripcion));
    }
}