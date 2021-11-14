<?php
// require_once 'Libraries/Controller.php';

class Main extends Controller {
    public function index() {
        Main::view('layout/header');
        Main::view('home/index');
        Main::view('layout/footer');
    }
}