<?php 

    require_once './model/produto.php';
    
    class ProdutoController{

        private $model;

        function __construct(){
            $this->model = new Produto;            
        }

        function insert($data){
            $result = $this->model->insert($data['nomeProduto']);
            header('Location:index.php/?entidade=produto');
        }

        function search(){
            $result = $this->model->search();
            require_once './view/view.php';
        }
        function update($data){
            $result = $this->model->update($data['id'], $data['nomeProduto']);
        }

        function delete($data){
            $result = $this->model->delete($data['id']);
        }

    }






?>