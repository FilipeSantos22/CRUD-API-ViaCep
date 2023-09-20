<?php
include __DIR__.'/../view/head.php';
include __DIR__.'/../view/assets/css/style.php';

class ViaCepException extends Exception {
    public $erro = '';

    public function __construct ($erro) {
        $this->erro = $erro;
    }
    public function cepNotFound() {
        echo '<div style="border: solid 1px black; padding:10px; background:black; color:white;">';
            echo $this->erro;
            echo '<script>
                alert("CEP não encontrado: ' . $this->erro . '");
                window.location.href = "/projeto_crud_API-CEP/CRUD-API-Viacep/controllers/cadastrar.php";
                </script>';
        echo '</div>';
    }    
}

?>