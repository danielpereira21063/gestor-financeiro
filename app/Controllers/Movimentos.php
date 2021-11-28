<?php

require_once ( APP.'/Models/MovimentosModel.php' );

class Movimentos {
    private $model;

    public function __construct() {
        $this->model = new MovimentosModel();
    }

    public function saveNewMovimento() {
        if ( in_array( '', $_POST ) ) {
            echo json_encode( 'vazio' );
        } else {
            if( $_POST['categoria'] != 'ADICIONADO' && $_POST['valor'] >= 0 ) {
                echo "error=cat&valor";
            } else if ( $_POST['categoria'] == 'ADICIONADO' && $_POST['valor'] <= 0 ) {
                echo "error=cat&valor";
            } else {
                $save = $this->model->saveNewMovimento( $_POST );
                if ( $save ) {
                    echo json_encode( $save );
                    // echo json_encode( 'success' );
                } else {
                    echo json_encode( 'error' );
                }
            }
        }
    }

    public function editarMovimento() {
        if ( in_array( '', $_POST ) ) {
            echo json_encode( 'vazio' );
        } else {
            if( $_POST['categoria'] != 'ADICIONADO' && $_POST['valor'] >= 0 ) {
                echo "error=cat&valor";
            } else if ( $_POST['categoria'] == 'ADICIONADO' && $_POST['valor'] <= 0 ) {
                echo "error=cat&valor";
            } else {
                $saveSuccess = $this->model->editarMovimento( $_POST );
                if ( $saveSuccess ) {
                    echo json_encode( $saveSuccess );
                    // echo json_encode( 'success' );
                } else {
                    echo json_encode( 'error' );
                }
            }
        }
    }

    public function removerMovimento($id = 0) {
        if($id > 0) {
            $removido = $this->model->removerMovimento($id);
            echo $removido;
        } else {
            echo json_encode(false);
        }
        
    }

    public function getDetalhes() {
        $detathes = $this->model->retornarDetalhes();

        echo json_encode($detathes);
    }
}