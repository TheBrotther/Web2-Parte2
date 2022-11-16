<?php
require_once "./model/HeroeModel.php";
require_once "./view/ApiView.php";

class HeroeControllerApi {
    private $data;
    private $view;
    private $model;
    private $atributes;

    public function __construct(){
        $this->view=new ApiView(); 
        $this->model=new HeroeModel;
        $this->data = file_get_contents("php://input");
        $this->atributes = array(   "id_heroe",
                                    "nombre",
                                    "type_atack",
                                    "descripcion");
    }
    //////////////////////////////////////////////////////////

    public function getHeroe($params = null){
        $id = $params[':ID'];
        $heroe = $this->model->getHeroeById($id);
        if ($heroe){
           $this->view->response($heroe);
        }else{
            $this->view->response("El heroe no existe", 404);}
    }

    public function getHeroes(){
        $heroes = $this->model->getAllItems("heroe");
        if ($heroes){
            $this->view->response($heroes);
        }else{
            $this->view->response("Vacio", 204);}
    }

    public function getByOrderedColumn($params = null){
        if($this->sanitized_column($params[':COLUMN'])) {
            $col = $params[':COLUMN'];
            if ($params[':ORDER'] == 'asc'){
                $heroes = $this->model->heroesByOrdenAsc($col);
            }else{
                $heroes = $this->model->heroesByOrdenDesc($col);}
        }
        if ($heroes){
            $this->view->response($heroes, 200);
        }else{
            $this->view->response('No content', 204);}
    }

    public function insertHeroe($params = null) {
        $heroe = $this->getData();
        if (empty($heroe->nombre) || 
            empty($heroe->type_atack) ||
            empty($heroe->id_atributo)||
            empty($heroe->descripcion)){
            $this->view->response("Complete los datos", 400);
        }else{
            $id = $this->model->agregarHeroe($heroe->nombre, 
                                            $heroe->type_atack, 
                                            $heroe->id_atributo,
                                            $heroe->descripcion);
            $heroe = $this->model->getHeroeById($id);
            $this->view->response($heroe, 201);}
    }

    public function getHeroesbyAtributo($params = null) {
        $id = $params[':ID'];
        $heroes = $this->model->getHeroesbyAtributo($id);
        if ($heroes){
            $this->view->response($heroes, 200);
        }else{
            $this->view->response('No content', 204);}
    }

    public function updateHeroe($params = []) {
        $id_heroe = $params[':ID'];
        $heroe = $this->model->getHeroeById($id_heroe);

        if ($heroe) {
            $body = $this->getData();
            $nombre = $body->nombre;
            $type_atack = $body->type_atack;
            $descripcion = $body->descripcion;
            $heroe = $this->model->editarHeroe($id_heroe, $nombre, $type_atack, $descripcion);
            $this->view->response("heroe id=$id_heroe actualizada con exito", 200);
        }
        else 
            $this->view->response("Task id=$id_heroe not found", 404);
    }

    public function deleteHeroe($params = null) {
        $id = $params[':ID'];
        $heroe = $this->model->getHeroeById($id);
        if ($heroe){
            $this->model->borrarHeroe($id);
            $this->view->response($heroe);
        }else 
            $this->view->response("La tarea con el id = $id no existe", 404);
    }
    

    public function sanitized_column($column){
        if (in_array($column, $this->atributes)){
            return true;
        }else{
            return false;}
    }

    private function getData() {
        return json_decode($this->data);
    }

}