<?php 

    require_once ('./controller/produtoController.php');
    require_once ('./controller/fornecedorController.php');
    require_once ('./controller/produtoFornecedorController.php');
    
    $produtoController = new ProdutoController();
    $fornecedorController = new FornecedorController();
    $produtoFornecedorController = new ProdutoFornecedorController();

    $action = !empty($_GET['a']) ? $_GET['a']: 'search';
    $entidade = !empty($_GET['entidade']) ? $_GET['entidade']: 'null';


    if($entidade == 'produto'){
        $produtoController->{$action}($_GET);

    }else if($entidade == 'fornecedor'){
        $fornecedorController->{$action}($_GET);

    }else if ($entidade == 'produtofornecedor'){
        $produtoFornecedorController->{$action}($_GET);
    }
    else{
        echo "Defina uma entidade";

    }
    
    

    
    

?>