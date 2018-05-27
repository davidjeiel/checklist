<?php
    
    class conexao{
        
        public  $conn;
        private $user = "root";
        private $pass = "";
        private $host = "localhost:3306";
        private $dbnm = "checklist";
        
        public function __construct(){
            $connect = new PDO( "sqlsrv:SERVER=".$this->host.";"."DATABASE=".$this->dbnm, $this->user, $this->pass);  
            $this->conn = $connect;
        }
        
        /*                 
        * @return: Executa query.
        * @param: query a executar.
        * @reurn: sem retorno de dados, apenas a execução da query.
        * @version: 0.1
        */
        public function runQuery($sql){
            $stm = $this->conn->prepare($sql);
            return $stm->execute();
        }
        
        /*                 
        * @return: Seleciona dados conforme query.
        * @param:  query de seleção a executar.
        * @reurn:  recordset.
        * @version: 0.1
        */
        public function runSelect($sql){
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }   
    }    