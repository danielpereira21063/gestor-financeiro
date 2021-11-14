<?php
require_once APP.'/Libraries/Database.php';

class GestorModel extends Database {
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
}