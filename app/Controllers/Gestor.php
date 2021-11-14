<?php
require_once APP.'/Models/gestorModel.php';

class Gestor extends Controller {
    public $db;

    public function __construct() {
        $this->db = new GestorModel();
    }


    public function salvar() {
        if(isset($_POST)) {

            echo json_encode($this->db->salvar($_POST));

            // if(in_array('', $_POST)) {
            //     echo json_encode('vazio');
            // } else {
            //     if($this->db->salvar($_POST)) {
            //         echo json_encode(1);
            //     } else {
            //         echo json_encode(0);
            //     }
            // }
        }
    }

}