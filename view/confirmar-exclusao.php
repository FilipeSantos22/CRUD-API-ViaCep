<?php 
include __DIR__.'/assets/css/style.php';
include __DIR__.'/head.php';
?>

<body class="">

</head>
<body>
  <div class="container">

    <div class="left-side"></div><!--  Lado da foto -->

    <div class="right-side"><!--  Lado do FORMULÁRIO -->
    <h2 class="text-center mb-5 text-light">Excluir cadastro</h2>
    <form action="" method="post">
        <div class="form-group">
          <p class="text-light">Você realmente deseja excluir o cadastro: <strong><?=$obPessoa->getNome();?></strong> ?</p>
        </div>
        <div class="form-group">
          <a href="/projeto-crud/index.php">
          <input src="/view/listagem.php" value="Cancelar" type="button" class="btn btn-success mr-3"></input>
          </a>  
          <input src="/view/listagem.php" name="excluir" value="Excluir" type="submit" class="btn btn-danger mr-3"></input>
        </div>  
      </form>
    </div>
  </div>
</body>
