<?php
require __DIR__ . '/../models/Pessoa.php';
require_once __DIR__ . '/../api/webService/ViaCep.php';
define('TITLE', 'Editar Cadastro');

$obPessoa = Pessoa::getPessoa($_GET['id']);

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: /projeto-crud/index.php?status=error');
    exit;
}
//VALDAÇÃO DA VAGA
if(!$obPessoa instanceof Pessoa) {
    header('Location: /projeto-crud/index.php?status=error');
}

//VALIDAÇÃO DO _POST
if(isset($_POST['nome'], $_POST['cpf'], $_POST['telefone'], $_POST['sexo'])) {

    $obEndereco = new Endereco();
    $obPessoa->setNome ($_POST['nome']);
    $obPessoa->setCpf  ($_POST['cpf']);
    $obPessoa->setTelefone ($_POST['telefone']);
    $obPessoa->setCep ($_POST['cep']);
    $obPessoa->setSexo ($_POST['sexo']);
    $obPessoa->atualizar(); 

    if(isset( $_POST['cep'])) {
        
        $cep = $_POST['cep'];
        $resultado = ViaCEP::consultarCEP($cep);
        $obEndereco->setIdPessoa ($obPessoa->getID());
        $obEndereco->setCep ($_POST['cep']);
        $obEndereco->setLogradouro ($resultado['logradouro']);
        $obEndereco->setBairro ($resultado['bairro']);
        $obEndereco->setLocalidade ($resultado['localidade']);
        $obEndereco->setUf ($resultado['uf']);
        $obEndereco->atualizar();
        // echo "<pre>"; print_r($obEndereco->getIdPessoa()); echo "</pre>"; exit;
    }
    header('Location: /projeto-crud/index.php?status=success');
    exit;
}

include __DIR__.'/../view/assets/css/style.php';
include __DIR__.'/../view/head.php';
include __DIR__.'/../view/header.php';
include __DIR__.'/../view/form.php';
include __DIR__.'/../view/footer.php';
?>