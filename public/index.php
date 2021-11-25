<?php

session_start();

require_once '../app/config.php';

require_once '../app/Libraries/Route.php';

require_once '../app/Libraries/Controller.php';

require_once '../app/Libraries/Database.php';

$db = new Database();
$route = new Route();


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