<?php 
    class Connect {
        protected $connection;

        function __construct(){
            $this-> connectDB();
            
        }

        private function connectDB(){
            try{
                $this->connection = new PDO ('mysql:host=localhost;dbname=bd', 'root','');
            }catch(PDOException $e){
                echo "Erro ao se conectar ".$e->getMessage();
                die();
            }
        }
    }
    
?>