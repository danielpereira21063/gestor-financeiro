<?php
// require_once 'Libraries/Controller.php';

class Main extends Controller {
    public function index() {
        Controller::view('layout/header');
        Controller::view('home/index');
        Controller::view('layout/footer');
    }
}