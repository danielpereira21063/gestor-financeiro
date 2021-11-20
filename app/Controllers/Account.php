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
        if(!empty($_POST)) {
            $resposta = $this->model->fazerLogin($_POST);

            echo $resposta;
        }
    }

    public function logout() {
        echo 'oiu';
    }
}