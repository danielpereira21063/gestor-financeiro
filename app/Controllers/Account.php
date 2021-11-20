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

            // echo json_encode($_POST);
            $resp = $this->model->fazerLogin($_POST);
            echo $resp;
        }
    }

    public function logout() {
        echo 'oiu';
    }
}