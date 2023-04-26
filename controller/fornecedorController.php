<?php 
    require_once "./model/fornecedor.php";
    


    class FornecedorController{

        private $model;

        function __construct(){
            $this->model = new Fornecedor;            
        }

        function insert($data){
            $result = $this->model->insert($data['nomeFornecedor']);
            header('Location:index.php/?entidade=fornecedor');
        }
        function search(){
            $result = $this->model->search();
            require_once './view/view.php';
        }
        function update($data){
            $result = $this->model->update($data['id'], $data['nomeFornecedor']);
        }

        function delete($data){
            $result = $this->model->delete($data['id']);
        }

    }







?>