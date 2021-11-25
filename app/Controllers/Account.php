<?php

require_once (APP."/Models/AccountModel.php");   

class Account extends Controller {
    private $model;
    
    public function __construct() {
        $this->model = new AccountModel();    
    }

    public function login() {
        Controller::view('layout/header');
        Controller::view('login');
        Controller::view('layout/footer');
    }

    public function postLogin() {
        if(isset($_POST) && !empty($_POST)) {
            $autorizado = $this->model->fazerLogin($_POST);
            if(isset($_SESSION['loginErrado'])) unset($_SESSION['loginErrado']);

            if(!$autorizado) {
                $_SESSION['loginErrado'] = 'Acesso negado!';
                $_SESSION['loginBackup'] = $_POST['usuario'];
                header('Location: ' . BASE_URL . '/account/login');
                return;
            }

            header('Location: ' . BASE_URL);
        }
    }

    public function logout() {
        echo 'oiu';
    }
}