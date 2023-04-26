<?php 
    include_once './configuration/connect.php';

    class Produto extends Connect {
        private $table; 

        function __construct(){
            parent::__construct();
            $this->table = "produtos";
        }

        public function insert ($produto){                  //Inserir 
            $sqlInsert = "INSERT INTO $this->table (nomeProduto) VALUE (:PRODUTO)";
            $query = $this->connection->prepare($sqlInsert);
            $query->bindParam(':PRODUTO', $produto);
            $query->execute();
            return $query;
        }
        
        public function update ($idProduto, $newName){     // Atualizar 
            $sqlUpdate = "UPDATE $this->table SET nomeProduto = :nomeNew where idProduto = :ID";
            $query = $this->connection->prepare($sqlUpdate);
            $query->bindParam(':ID',$idProduto);
            $query->bindParam(':nomeNew', $newName);
            $query->execute();
        }

        public function search(){                          //Listar
            $sqlSelect = "SELECT * FROM $this->table ";
            $query = $this->connection->query($sqlSelect);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function delete($idProduto){                 //Apagar
            $sqlDelete = "DELETE FROM $this->table WHERE idProduto = :ID";
            $query = $this->connection->prepare($sqlDelete);
            $query->bindParam('ID', $idProduto);
            $query->execute();
        }

    }
    
?>