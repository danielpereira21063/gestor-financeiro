<?php
class Account extends Controller {
    public function login() {
        Controller::view('layout/header');
        Controller::view('login');
        Controller::view('layout/footer');
    }

    public function logout() {
        echo 'oiu';
    }
}