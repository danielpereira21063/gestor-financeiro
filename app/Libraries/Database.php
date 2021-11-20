<?php
require_once(APP.'/config.php');

class Database {
    private $dbh;
    private $stmt;

    public function __construct() {
        try {
            $this->dbh = new \PDO(
                'mysql:'.
                'host='.MYSQL_HOST.';'.
                'dbname='.MYSQL_DB.';'.
                'charset='.'utf8',
                MYSQL_USERNAME,
                MYSQL_PASSWD,
                array( \PDO::ATTR_PERSISTENT => true, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
            );
        } catch ( \PDOException $pe ) {
            echo '<h3 style="text-color: red;">'.$pe->getMessage().'</h3>';
        } catch ( \Exception $e ) {
            echo '<h3 style="text-color: red;">'.$e->getMessage().'</h3>';
        }
    }

    public function query( $sql ) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function bind( $parametro, $valor, $tipo = null ) {
        if ( is_null( $tipo ) ) {
            switch( true ) {
                case is_int( $valor ):
                $tipo = PDO::PARAM_INT;
                break;

                case( is_bool( $valor ) ):
                $tipo = PDO::PARAM_BOOL;
                break;

                case is_null( $valor ):
                $tipo = PDO::PARAM_NULL;
                break;

                default:
                $tipo = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue( $parametro, $valor, $tipo );
    }

    public function result() {
        $this->execute();
        return $this->stmt->fetch( PDO::FETCH_OBJ );
    }

    public function results() {
        $this->execute();
        return $this->stmt->fetchAll( PDO::FETCH_OBJ );
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }

    public function lastInsertedId() {
        return $this->dbh->lastInsertId();
    }

    public function close() {
        $this->dbh = null;
        $this->stmt = null;
    }

}