<?php
require_once (APP.'/Libraries/Database.php');  

class AccountModel extends Database {
    public function salvar($data) {
        
        $sql = "SELECT MAX(id_movimento) as max_id from movimentos";
        $this->query($sql);
        $lastId = $this->result()->max_id;

        $sql = "SELECT * FROM movimentos WHERE id_movimento = $lastId";
        $this->query($sql);
        $ultimoMovimento = $this->result();

        $gastandoDinheiro = $data['gastando'];

        $saldoAtual = $ultimoMovimento->saldoTotal;

        if($gastandoDinheiro) {
            $saldoNovo = $saldoAtual - $data['valor'];
        } else {
            $saldoNovo = $saldoAtual + $data['valor'];
        }

        // $saldoNovo = str_replace('.', ',', $saldoNovo);

        // return $saldoNovo;

        $dataMovimento = date('Y-m-d');

        $sql = "INSERT INTO movimentos (id_movimento, categoria, valor, saldoTotal, descricao, data) VALUES (DEFAULT, :categ, :val, :saldoTot :descr, :dt)";
        $this->query($sql);
        
        $this->bind(':categ', $data['categoria']);
        $this->bind(':val', $data['valor']);
        $this->bind(':saldoTot', $saldoNovo);
        $this->bind(':descr', $data['descricao']);
        $this->bind(':dt', $dataMovimento);
        
        if($this->execute()) return true;


        return false;
    }

    public function fazerLogin($dados) {
        $usuario = $dados["usuario"];
        $usuario = str_replace("'", "", $usuario);
        $sql = "SELECT * FROM usuarios WHERE `nomeUsuario` = '$usuario'";
        $this->query($sql);
        $result = count($this->results());



        if($result == 0) return '403'; //access_denied

        $senha = $this->results()[0]->senha;

        $permitido = password_verify($dados['senha'], $senha);

        return $permitido == 1 ? "200" : "403";
    }
}