<?php
require __DIR__ . '/../models/Pessoa.php';

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
if(isset($_POST['excluir'])) {
    
    $obPessoa->excluir(); 
    header('Location: /projeto-crud/index.php?status=success');
    exit;   
}
include __DIR__.'/../view/assets/css/style.php';
include __DIR__.'/../view/head.php';
include __DIR__.'/../view/header.php';
include __DIR__.'/../view/confirmar-exclusao.php';
include __DIR__.'/../view/footer.php';
?>