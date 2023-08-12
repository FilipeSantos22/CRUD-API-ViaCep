<head>
    <script src="/projeto-crud/view/assets/js/scripts.js"></script>
</head>

</head>
<body>

  <div class="container">
    <!-- <div class="border-primary"> -->
    <div class="left-side" id="borda-foto"></div><!--  Lado da foto -->

        <div class="right-side " id="borda-form"><!--  Lado do FORMULÁRIO -->
          <h2 class="text-center mb-5 text-light "><?=TITLE?></h2>
          <form action="" method="post">
              <div class="form-group">
                <label class="text-light" for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="nome" placeholder="Digite seu nome" required value="<?= $obPessoa->getNome()?>">
              </div>

              <div class="form-group">
                <label class="text-light" for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" onkeypress="mascaraCpf(this)" required maxlength="14" value="<?=$obPessoa->getCpf()?>">
              </div>

              <div class="form-group">
                <label class="text-light" for="phone">Telefone:</label>
                <input type="text" class="form-control" id="phone" name="telefone" onkeypress="mascara(this)" placeholder="Digite seu telefone" required maxlength="15"   value="<?=$obPessoa->getTelefone()?>">  
              </div>

              <div class="form-group">
                <label class="text-light" for="cep">Endereço:</label>
                <input type="text" class="form-control" id="cep" name="cep" onkeypress="mascaraCep(this)" placeholder="Digite seu CEP" required maxlength="9"   value="<?=$obPessoa->getCep()?>">
              </div>

              <div class="form-group">
                <label class="text-light" for="sexo" >Sexo:</label>

                <select class="form-control" id="sexo" name="sexo" required>
                    <option value=""></option>
                    <option value="masculino" <?= $obPessoa->getSexo() == 'masculino' ? 'selected' : '' ?>>Masculino</option>
                    <option value="feminino" <?= $obPessoa->getSexo() == 'feminino' ? 'selected' : '' ?>>Feminino</option>
                </select>
              </div>

              <input src="/view/listagem.php" type="submit" class="btn btn-primary mr-3">        
              <a href="/projeto-crud/index.php">
                <div class="btn btn-primary m3-3 ">Ver cadastros</div>
              </a>   
          </form>
        </div>
      </div>
  </div>
</body>