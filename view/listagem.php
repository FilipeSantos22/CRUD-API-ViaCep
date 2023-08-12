<?php
    include __DIR__.'/head.php';
    include __DIR__.'/assets/css/style.php';

  $mensagem = '';
  if (isset($_GET['status'])) {
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert text-center alert-success">Ação executada com sucesso!</div>';
        break;
        
      case 'error':
        $mensagem = '<div class="alert text-center alert-danger">Ação não executada!</div>';
        break;
    }
  }
 
  $resultados = '';

  foreach ($pessoas as $pessoa) {
    $resultados .= '<tr> 
                        <td class=" text-light">'.$pessoa->getId().'</td>
                        <td class=" text-light">'.$pessoa->getNome().'</td>
                        <td class=" text-light">'.$pessoa->getCpf().'</td>
                        <td class=" text-light">'.$pessoa->getTelefone().'</td>
                        <td class=" text-light">'.$pessoa->getCep().'</td>     
                        <td class=" text-light">'.ucfirst($pessoa->getSexo()).'</td>
                        <td>
                          <a href="controllers/editar.php?id='.$pessoa->getId().'">
                            <button type="button" class="btn btn-primary"> Editar</button>
                          </a>
                          <a href="controllers/excluir.php?id='.$pessoa->getId().'">
                            <button type="button" class="btn btn-danger"> Excluir</button>
                          </a>
                        </td>
                    </tr>';
  }

?>
  
<body>
  
  <?=$mensagem?>

  <div class="text-center">
    <a href="/projeto-crud/controllers/cadastrar.php">
      <button class="btn btn-primary mt-3 ">Novo cadastro</button>
    </a>
    <h2 class="text-center mt-2">Pessoas cadastradas</h2>
  </div>

  <section>
      <div class="container-fluid"  style=" max-height: 600px; max-width: 70%; overflow-y: auto;">
        <table class="table table-striped bg-color">
          <thead>
            <tr class="bg-color">
              <th scope="col" class="table_color text-light">ID</th>
              <th scope="col" class="table_color text-light">Nome</th>
              <th scope="col" class="table_color text-light">CPF</th>
              <th scope="col" class="table_color text-light">Telefone</th>
              <th scope="col" class="table_color text-light">Endereço</th>
              <th scope="col" class="table_color text-light">Sexo</th>
              <th scope="col" class="table_color text-light">Ações</th> 
            </tr>
          </thead>
          <tbody>
            <?= $resultados?>
          </tbody>
        </table>
      </div>
  </section>
</body>