<?php 
    include_once './configuration/connect.php';

    class ProdutoFornecedor extends Connect {
        private $table; 

        function __construct(){
            parent::__construct();
            $this->table = "produto_fornecedor";
        }

        public function insert ($data){                  //Inserir 
            $sqlInsert = "INSERT INTO $this->table (fk_idFornecedor,fk_idProduto,valor) VALUES (:FKFORNECEDOR, :FKPRODUTO,:VALOR)";
            $query = $this->connection->prepare($sqlInsert);
            $query->bindParam(':FKFORNECEDOR', $data['fornecedor']);
            $query->bindParam(':FKPRODUTO', $data['produto']);
            $query->bindParam(':VALOR', $data['valor']);
            $query->execute();
            return $query;
        }
        
        public function update ($data){     // Atualizar 
            $sqlUpdate = "UPDATE $this->table SET valor = :newValor where id = :ID";
            $query = $this->connection->prepare($sqlUpdate);
            $query->bindParam(':ID',$data['id']);
            $query->bindParam(':newValor', $data['valor']);
            $query->execute();
        }

        public function search(){                          //Listar
            $sqlSelect = "SELECT * FROM $this->table ";
            $query = $this->connection->query($sqlSelect);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function delete($data){                 //Apagar
            $sqlDelete = "DELETE FROM $this->table WHERE id = :ID";
            $query = $this->connection->prepare($sqlDelete);
            $query->bindParam('ID', $data['id']);
            $query->execute();
        }

    }
    
?>