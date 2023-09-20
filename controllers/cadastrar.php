<?php
require_once __DIR__ . '/../models/Pessoa.php';
require_once __DIR__ . '/../models/Endereco.php';
require_once __DIR__ . '/../api/webService/ViaCep.php';
require_once __DIR__ . '/../exceptions/ViaCepException.php';

define('TITLE', 'MEU CLUD');

$errorMessage = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';

//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
$obPessoa = new Pessoa();
$obEndereco = new Endereco();
$obEnderecoApi = new ViaCEP();


if(isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['sexo'], $_POST['cep'])) {
    
    $obEndereco = new Endereco();
    $obPessoa = new Pessoa(); 
    
    $obPessoa->setNome ($_POST['nome']);
    $obPessoa->setCpf  ($_POST['cpf']);
    $obPessoa->setTelefone ($_POST['telefone']);
    $obPessoa->setCep ($_POST['cep']);
    $obPessoa->setSexo ($_POST['sexo']);
  
    
    $obPessoa->cadastrar();
    if(isset( $_POST['cep'])) {
        
        $cep = $_POST['cep'];
        $resultado = ViaCEP::consultarCEP($cep);
        // echo "<pre>"; print_r($_POST['cep']); echo "</pre>"; exit;
        
        $obEndereco->setIdPessoa($obPessoa->getID());
        $obEndereco->setCep($resultado['cep']);
        $obEndereco->setLogradouro($resultado['logradouro']);
        $obEndereco->setBairro($resultado['bairro']);
        $obEndereco->setLocalidade($resultado['localidade']);
        $obEndereco->setUf($resultado['uf']);
        $obEndereco->cadastrar();
        echo "<pre>"; print_r($resultado['cep']); echo "</pre>"; exit;
        header('Location: /projeto_crud_API-CEP/CRUD-API-Viacep/index.php?status=success');
        exit;   
    }else {
        echo $e->cepNotFound();
        header('Location: /projeto_crud_API-CEP/CRUD-API-Viacep/index.php?error');
    }
}

include __DIR__.'/../view/head.php';
include __DIR__.'/../view/assets/css/style.php';
include __DIR__.'/../view/header.php';
include __DIR__.'/../view/form.php';
include __DIR__.'/../view/footer.php';

?>