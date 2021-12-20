<?php

session_start();

require_once '../app/config.php';

require_once '../app/Libraries/Route.php';

require_once '../app/Libraries/Controller.php';

require_once '../app/Libraries/Database.php';

$db = new Database();
$route = new Route();


//atualiza o saldo

// $sql = "SELECT * FROM movimentos JOIN saldo WHERE saldo.idMovimento = movimentos.id_movimento order by idMovimento;";
// $db->connect();
// $db->query($sql);
// $r = $db->results();
// var_dump($r);

// $valores = [];
// for($i = 0; $i < count($r); $i++) {
//     if($i < 33) {
//         $valores[$i] = $r[$i+1]->idMovimento . ' === ' . $r[0]->saldoAtual += ($r[$i+1]->valor);
//     }
// }
// var_dump($valores);
////////////////


//SQL PARA ATUALIZAR O SALDO ATUAL DE ACORDO COM OS MOVIMENTOS

// $sql = "SELECT * FROM movimentos";
// $db->query($sql);
// $movimentos = $db->results();


// $sql = "";


//SQL PARA ATUALIZAR O ID SALDO NOS MOVIMENTOS
// for ($i = 0; $i< count($movimentos); $i++) {
//     $mov = $movimentos[$i];
//     $sql .= "insert into saldo values (DEFAULT, '1', '$mov->id_movimento', '$mov->data', '$mov->saldoTotal');";
// }
// echo $sql;

// $db->query($sql);
// $db->execute();


// $sql = "";

?>