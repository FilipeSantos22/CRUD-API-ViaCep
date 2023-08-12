<?php
require_once __DIR__ . '/../models/Pessoa.php';
require_once __DIR__ . '/../models/Endereco.php';
require_once __DIR__ . '/../api/webService/ViaCep.php';

define('TITLE', 'MEU CLUD');

$errorMessage = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';

//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
$obPessoa = new Pessoa();
$obEndereco = new Endereco();
$obEnderecoApi = new ViaCEP();

//VALIDAÇÃO DO _POST
if(isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['sexo'], $_POST['cep'])) {
    
    $obEndereco = new Endereco();
    $obPessoa = new Pessoa(); 
    
    $obPessoa->setNome ($_POST['nome']);
    $obPessoa->setCpf  ($_POST['cpf']);
    $obPessoa->setTelefone ($_POST['telefone']);
    $obPessoa->setCep ($_POST['cep']);
    $obPessoa->setSexo ($_POST['sexo']);
    // $obEndereco->setCep($_POST['cep']);
    
    $obPessoa->cadastrar();

    if(isset( $_POST['cep'])) {
        
        $cep = $_POST['cep'];
        $resultado = ViaCEP::consultarCEP($cep);
        
        $obEndereco->setIdPessoa($obPessoa->getID());
        $obEndereco->setCep($resultado['cep']);
        $obEndereco->setLogradouro($resultado['logradouro']);
        $obEndereco->setBairro($resultado['bairro']);
        $obEndereco->setLocalidade($resultado['localidade']);
        $obEndereco->setUf($resultado['uf']);
        $obEndereco->cadastrar();
        // echo "<pre>"; print_r($obEndereco->getIdPessoa()); echo "</pre>"; exit;
        header('Location: /projeto-crud/index.php?status=success');
        exit;   
    }else {
        header('Location: /projeto-crud/index.php?error');
    }
}

include __DIR__.'/../view/head.php';
include __DIR__.'/../view/assets/css/style.php';
include __DIR__.'/../view/header.php';
include __DIR__.'/../view/form.php';
include __DIR__.'/../view/footer.php';

?>