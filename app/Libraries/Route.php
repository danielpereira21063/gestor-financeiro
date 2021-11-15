<?php

class Route {
    private $controller = 'main';
    private $method = 'index';
    private $paramns = [];

    public function __construct() {
        $url = $this->url() ? $this->url() : [];

        if(isset($url[1])) {
            if(file_exists('../app/Controllers/'. ucwords($url[1]) .'.php')) {
                $this->controller = $url[1];
                unset($url[1]);
            }
        }
        $this->controller = ucwords($this->controller);

        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if(isset($url[2])) {
            if(method_exists($this->controller, $url[2])) {
                $this->method = ucwords($url[2]);
                unset($url[2]);
            }
        }

        $this->paramns = $url ? array_values($url) : [];
        call_user_func_array([ $this->controller, $this->method ], $this->paramns);
    }

    private function url() {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        if(isset($url)) {
            $url = rtrim(trim($url));
            $url = explode('/', $url);
            unset($url[0]);
            // $url[0] = $url[1] ?? '';
            // $url[1] = $url[2] ?? '';
            // $url[2] = $url[3] ?? '';
            return $url;
        }
    }
}