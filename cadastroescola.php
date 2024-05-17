<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Cadastrar Escola</title>
  <link rel="stylesheet" href="cadastroescola.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent" id="nav">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Dados Alunos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastroescola.php">Cadastro Escola</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container  p-3 mt-5">
    <?php if (isset($_GET['resposta'])): ?>
      <?php if ($_GET['resposta'] == 1): ?>
        <div class="alert alert-success" role="alert">
          Dado inserido com sucesso!
        </div>
      <?php else: ?>
        <div class="alert alert-danger" role="alert">
          Erro ao inserir o dado: <?= $_GET['resposta'] ?>
        </div>
      <?php endif ?>
    <?php endif ?>
    <form action="cadastro.php" method="POST">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputNome">Nome da Escola</label>
          <input type="text" class="form-control" id="inputNome" placeholder="Nome..." name="Nome">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="E-Mail" name="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEndereco">Endereço</label>
        <input type="text" class="form-control" id="inputEndereco" placeholder="Endereço..." name="Endereco">
      </div>
      <div class="form-group">
        <label for="inputTelefone">Telefone</label>
        <input type="text" class="form-control" id="inputTelefone" placeholder="Telefone..." name="Telefone">
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputSenha">Senha</label>
          <input type="text" class="form-control" id="inputSenha" placeholder="Senha..." name="Senha">
        </div>
        <div class="form-group col-md-6">
          <label for="inputTipo">Tipo Escola</label>
          <select id="inputTipo" class="form-control" name="Tipo">
            <option selected>Privada</option>
            <option>Pública</option>
          </select>
        </div>
        <button type="submit" id="btn-cadastrar" class="btn btn-primary mt-5 col-md-2">Cadastrar</button>
      </div>
    </form>
  </div>
</body>

</html>