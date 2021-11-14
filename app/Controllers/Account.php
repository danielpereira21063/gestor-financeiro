<?php
class Account extends Controller {
    public function login() {
        Account::view('layout/header');
        Account::view('login');
        Account::view('layout/footer');
    }

    public function logout() {
        echo 'oiu';
    }
}