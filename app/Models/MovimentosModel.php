<?php

require_once (APP.'/Libraries/Database.php');  

class MovimentosModel extends Database {
    public function getMovimentos($idUser) {
        $this->connect();

        $dados = [];
        
        $sql = "SELECT * FROM movimentos WHERE id_usuario = '$idUser' ORDER BY `data` DESC";

        $this->query($sql);

        $dados = $this->results();

        $this->close();
        return json_encode($dados);
    }

    public function saveNewMovimento($dados) {
        $this->connect();
        
        $idUser = $_SESSION['id_user'];
        
        extract($dados);
        $categoria = str_replace("'", "", $categoria);
        $valor = str_replace("'", "", $valor);
        $descricao = str_replace("'", "", $descricao);
        $local = str_replace("'", "", $local);
        
        $sql = "";

        $sql = "INSERT INTO movimentos (id_usuario, categoria, valor, `local`, descricao) VALUES ('$idUser', '$categoria', '$valor', '$local', '$descricao');";
        $this->query($sql);
        $this->execute();
        
        $sql = "SELECT max(id_movimento) as maxId from movimentos WHERE id_usuario = '$idUser';";
        $this->query($sql);
        $maxIdMov = $this->results()[0]->maxId;

        $sql = "SELECT * FROM saldo WHERE idSaldo = ( SELECT max(idSaldo) from saldo );";
        $this->query($sql);
        $saldoAtual = $this->results()[0]->saldoAtual;
        $novoSaldo = $saldoAtual + $valor;

        $sql = "INSERT INTO saldo (idUsuario, idMovimento, saldoAtual) VALUES ('$idUser', $maxIdMov, $novoSaldo)";
        
        $this->query($sql);
        $this->execute();

        $this->close();
        return true;
    }

    public function editarMovimento($dados) {
        return $dados;
    }

    public function removerMovimento($id) {
        $this->connect();

        $sql = "DELETE FROM movimentos WHERE id_movimento = '$id';";
        $sql .= "DELETE FROM saldo WHERE idMovimento = '$id';";
        $this->query($sql);

        if($this->execute()) {
            $this->close();
            return true;
        } else {
            $this->close();
            return false;
        }
        
    }

    public function retornarDetalhes() {
        $this->connect();
        $idUser = $_SESSION['id_user'];

        $sql = "SELECT * from saldo where idSaldo =  (SELECT max(idSaldo) from saldo WHERE idUsuario = '$idUser')";


        $this->query($sql);
        $saldo = $this->results()[0];

        $mesAtual = date("m");
        $anoAtual = date("Y");
        $fimMes = $mesAtual % 2 == 0 ? "31" : "30";

        $bisexto = date("L");
        if($mesAtual == 2) $fimMes = $bisexto ? "29" : "28";

        $inicioMes = "01";
        $dataInicio = $anoAtual . '/' . $mesAtual . '/' . $inicioMes;
        $dataFim = $anoAtual . '/' . $mesAtual . '/' . $fimMes;

        
        $sql = "SELECT sum(valor) as gastoMes FROM movimentos WHERE valor < 0 AND id_usuario = '$idUser' AND `data` >= '$dataInicio' AND `data` <= '$dataFim'";
        $this->query($sql);
        $gastoMensal = $this->results()[0];

        $sql = $sql = "SELECT sum(valor) as ganhoMes FROM movimentos WHERE valor > 0 AND id_usuario = '$idUser' AND `data` >= '$dataInicio' AND `data` <= '$dataFim'";
        $this->query($sql);
        $ganhoMensal = $this->results()[0];

        $retorno = [
            "saldo" => $saldo->saldoAtual,
            "gastoMensal" => $gastoMensal->gastoMes,
            "ganhoMensal" => $ganhoMensal->ganhoMes
        ];

        $this->close();
        return $retorno;
    }
}