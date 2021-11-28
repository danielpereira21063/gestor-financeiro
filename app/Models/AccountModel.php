<?php
require_once (APP.'/Libraries/Database.php');  

class AccountModel extends Database {

    public function fazerLogin($dados) {
        $this->connect();

        $usuario = $dados["usuario"];
        $usuario = str_replace("'", "", $usuario);
        $sql = "SELECT * FROM usuarios WHERE `nomeUsuario` = '$usuario'";
        $this->query($sql);
        $result = count($this->results());



        if($result == 0) return false; //access_denied

        $dadosUser = $this->results()[0];
        $senha = $dadosUser->senha;

        $permitido = password_verify($dados['senha'], $senha);

        if($permitido) {
            $_SESSION["id_user"] = $dadosUser->id;
            $_SESSION["nome"] = $dadosUser->nome;
            $_SESSION["nome_user"] = $dadosUser->nomeUsuario;
            $_SESSION["email"] = $dadosUser->email;

            return true;
        }

        $this->close();
        return false;

    }
}