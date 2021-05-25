<?php


class Database {

    private $host = 'ec2-54-87-112-29.compute-1.amazonaws.com';
    private $usuario = 'xekcvktfbijhgg';
    private $senha = '5632494d11491b7564708c22a2a73d6f1bc1891025a49503cc83576df1365f40';
    private $banco = 'deuda74mn17o99';
    private $porta = '5432';
    private $dbh;
    private $stmt;



    public function __construct()
    {
        //fonte de dados ou DSN contém as informações necessárias para conectar ao banco de dados.
        $dsn = 'pgsql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            //armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicativo mais rápido
            PDO::ATTR_PERSISTENT => true,
            //lança uma PDOException se ocorrer um erro 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            //cria a instancia do PDO
            $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    //Prepared Statements com query
    public function query($sql){
        //prepara uma consulta sql
        $this->stmt = $this->dbh->prepare($sql);
    }

    //vincula um valor a um parâmetro
    public function bind($parametro, $valor, $tipo = null){
        if(is_null($tipo)):
            switch (true):
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                $tipo = PDO::PARAM_STR;
            endswitch;
        endif;

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    //executa prepared statement
    public function executa(){
        return $this->stmt->execute();
    }

    //obtem um único registro
    public function resultado(){
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //obtem um conjunto de registros
    public function resultados(){
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //retorna o número de linhas afetadas pela última instrução SQL
    public function totalResultados(){
        return $this->stmt->rowCount();
    }

    //retorna o último ID inserido no banco de dados
    public function ultimoIdInserido(){
        return $this->dbh->lastInsertId();
    }

}



