<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login BFP</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <form action="dados.php" class="container d-flex justify-content-center align-items-center flex-column gap-5" id="form__container" method="POST">
    <h1 id="login">Login</h1>
    <?php if(isset($_GET['erro']) && $_GET['erro'] > 0 ) : ?>
        <div class="alert alert-dark" data-bs-theme="dark" role="alert">
          Email ou senha inválidos!
        </div>
      <?php endif ?>
    <div class="form-group">
      <div class="form__group field">
        <input type="email" class="form__field" placeholder="Email" name="email" id='email' required />
        <label for="email" class="form__label">Email</label>
      </div>
    </div>
    <div class="form-group">
      <div class="form__group field">
        <input type="password" class="form__field" placeholder="Senha" name="senha" id='senha' required />
        <label for="senha" class="form__label">Senha</label>
        <button class="btn" type="button" id="showPassword">
          <i class="fas fa-eye" id="olho"></i>
        </button>
      </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary" id="entrar">Entrar</button>
  </form>
  <script src="login.js"></script>

</body>

</html>