<?php
include __DIR__.'/models/Pessoa.php';
include_once __DIR__.'/models/Endereco.php';
$pessoas = Pessoa::getPessoas();
$enderecos = Endereco::getEnderecos();

include __DIR__.'/view/assets/css/style.php';
include __DIR__.'/view/head.php';
include __DIR__.'/view/header.php';
include __DIR__.'/view/listagem.php';
include __DIR__.'/view/verCep.php';
include __DIR__.'/view/footer.php';
?>
