<?php
require_once "./model/AtributoModel.php";
require_once "./view/ApiView.php";

class AtributoControllerApi {
    private $model;
    private $view;
    private $data;
    private $atributes;
    
    public function __construct(){
        $this->view = new ApiView(); 
        $this->model = new AtributoModel();
        $this->data = file_get_contents("php://input");
        $this->atributes = array("nombre");
    }
    ////////////////////////////////////////////////////

    public function getAtributo($params = null){
        $id = $params[':ID'];
        $atributo = $this->model->getAtributoById($id);
        if ($atributo)
           $this->view->response($atributo);
        else
            $this->view->response("El atributo no existe", 404);
    }

    public function getAtributos(){
        $atributos = $this->model->getAllItems("atributo");
        if ($atributos)
            $this->view->response($atributos);
        else
            $this->view->response("Vacio", 204);
    }

    public function insertAtributo($params = null) {
        $atributo = $this->getData();

        if (empty($atributo->nombre)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->agregarAtributo($atributo->nombre);
            $atributo = $this->model->getAtributoById($id);
            $this->view->response($atributo, 201);
        }
    }

    public function getByOrderedColumn($params = null){
        if($this->sanitized_column($params[':COLUMN'])) {
            $col = $params[':COLUMN'];
            if ($params[':ORDER'] == 'asc')
                $atributos = $this->model->atributosByOrdenAsc($col);
            else
                $atributos = $this->model->atributosByOrdenDesc($col);    
        }   
        if ($atributos)
            $this->view->response($atributos, 200);
        else
            $this->view->response('No content', 204);
    }

    public function updateAtributo($params = []) {
        $id_atributo = $params[':ID'];
        $atributo = $this->model->getAtributoById($id_atributo);

        if ($atributo) {
            $body = $this->getData();
            $nombre = $body->nombre;
            $atributo = $this->model-> editarAtributo($id_atributo, $nombre);
            $this->view->response("Atributo id=$id_atributo updated successfuly", 200);
        }
        else 
            $this->view->response("Task id=$id_atributo not found", 404);
    }

    public function deleteAtributo($params = null) {
        $id = $params[':ID'];

        $atributo = $this->model->getAtributoById($id);
        if ($atributo) {
            $this->model->borrarAtributoById($id);
            $this->view->response($atributo);
        } else 
            $this->view->response("La tarea con el id = $id no existe", 404);
    }

    public function sanitized_column($column){
        if (in_array($column, $this->atributes))
            return true;
        else
            return false;
    }

    private function getData() {
        return json_decode($this->data);
    }
}