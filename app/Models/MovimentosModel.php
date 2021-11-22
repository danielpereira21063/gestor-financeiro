<?php

require_once (APP.'/Libraries/Database.php');  

class MovimentosModel extends Database {
    public function getDadosUsuario($idUser) {
        $dados = [];
        
        $sql = "SELECT * FROM movimentos WHERE id_usuario = '$idUser' ORDER BY `data` DESC";

        $this->query($sql);

        $dados = $this->results();

        return json_encode($dados);
    }
}