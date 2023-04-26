<?php 

    include_once './configuration/connect.php';

    class Fornecedor extends Connect {
        private $table; 

        function __construct(){
            parent::__construct();
            $this->table = "fornecedor";
        }

        public function insert ($fornecedor){                  //Inserir 
            $sqlInsert = "INSERT INTO $this->table (nomeFornecedor) VALUE (:FORNECEDOR)";
            $query = $this->connection->prepare($sqlInsert);
            $query->bindParam(':FORNECEDOR', $fornecedor);
            $query->execute();
        }
        
        public function update ($idFornecedor, $newName){     // Atualizar 
            $sqlUpdate = "UPDATE $this->table SET nomeFornecedor = :nomeNew where idFornecedor = :ID";
            $query = $this->connection->prepare($sqlUpdate);
            $query->bindParam(':ID',$idFornecedor);
            $query->bindParam(':nomeNew', $newName);
            $query->execute();
        }

        public function search(){                          //Listar
            $sqlSelect = "SELECT * FROM $this->table ";
            $query = $this->connection->query($sqlSelect);
            $result = $query->fetchAll();
            echo json_encode($result );
        }
        public function delete($idFornecedor){                 //Apagar
            $sqlDelete = "DELETE FROM $this->table WHERE idFornecedor = :ID";
            $query = $this->connection->prepare($sqlDelete);
            $query->bindParam('ID', $idFornecedor);
            $query->execute();
        }

    }
    
?>