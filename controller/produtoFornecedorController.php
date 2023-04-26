<?php 

    require_once './model/produtoFornecedor.php';
    
    class ProdutoFornecedorController{

        private $model;

        function __construct(){
            $this->model = new ProdutoFornecedor;            
        }

        function insert($data){
            $result = $this->model->insert($data);
            header('Location:index.php/?entidade=produtofornecedor');
        }

        function search(){
            $result = $this->model->search();
            require_once './view/view.php';
        }
        function update($data){
            $result = $this->model->update($data);
            header('Location:index.php/?entidade=produtofornecedor');
        }

        function delete($data){
            $result = $this->model->delete($data);
            header('Location:index.php/?entidade=produtofornecedor');
        }

    }






?>