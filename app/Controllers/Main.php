<?php
require_once (APP."/Models/MovimentosModel.php");   

class Main extends Controller {
    private $model;

    public function __construct()
    {
        $this->model = new MovimentosModel();
    }

    public function index() {
        Controller::view('layout/header');
        Controller::view('home/index');
        Controller::view('layout/footer');
    }

    public function getDadosUsuario() {
        if(isset($_SESSION["id_user"])) {
            $id = $_SESSION['id_user'];
            $dadosUsuario = $this->model->getDadosUsuario($id);

            echo $dadosUsuario;
        }
    }
}