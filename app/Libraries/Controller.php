<?php

class Controller {
    public function model($model) {
        $modelFile = '../app/Models/'. $model. '.php';
        if(file_exists($modelFile)) {
            return new $modelFile;
        } else {
            die("<h1 style='color: red'>O arquivo de model não existe: {<strong>$modelFile</strong>}</h1>");
        }
    }

    public function view($view, $data = []) {
        $viewFile = '../app/Views/'. $view .'.php';
        if(file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("<h1 style='color: red'>O arquivo de view não existe: {<strong>$viewFile</strong>}</h1>");
        }
    }
}