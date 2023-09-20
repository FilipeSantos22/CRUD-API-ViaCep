<?php
require_once __DIR__ . '/../models/Pessoa.php';
include_once __DIR__.'/../models/Endereco.php';
include_once __DIR__.'/../api/webService/ViaCep.php';
include __DIR__.'/head.php';
include __DIR__.'/assets/css/style.php';

$resultadosEndereco = '';

foreach ($enderecos as $endereco) {

  $idPessoa = $endereco->getIdPessoa() ?: $endereco->idpessoa;

    $resultadosEndereco .= '<tr>
                                  <td class=" text-light">'.$idPessoa.'</td>
                                  <td class=" text-light">'.$endereco->getCep().'</td>
                                  <td class=" text-light">'.$endereco->getBairro().'</td>
                                  <td class=" text-light">'.$endereco->getLogradouro().'</td>
                                  <td class=" text-light">'.$endereco->getUf().'</td>
                                  <td class=" text-light">'.$endereco->getLocalidade().'</td>                                  
                            </tr>';                     
}    
?>
<body>
  <h2 class="text-center mt-2">Endereço completo</h2>
  <section>
      <div class="container-fluid"  style=" max-height: 600px; max-width: 70%; overflow-y: auto;">
        <table class="table table-striped bg-color">
          <thead>
            <tr class="bg-color">
              <th scope="col" class="table_color text-light">ID</th>
              <th scope="col" class="table_color text-light">CEP</th>
              <th scope="col" class="table_color text-light">Bairro</th>
              <th scope="col" class="table_color text-light">Rua</th>
              <th scope="col" class="table_color text-light">UF</th>
              <th scope="col" class="table_color text-light">Cidade</th>
            </tr>
          </thead>
          <tbody>
              <?= $resultadosEndereco?>
          </tbody>
        </table>
      </div>
  </section> 
</body>
</html>