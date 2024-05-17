<?php
include '../conexao.php';
$sql = "SELECT * FROM aluno";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
$linhas = $stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Dados Alunos</title>

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
                    <a class="nav-link" href="../escola/cadastroescola.php">Cadastro Escola</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1 class="text-center text-white ">Mostrar Alunos</h1>
    <div class="container">
        <div class="border p-3 border-dark rounded bg-dark">
            <table class="table table-bordered table-dark">
            <form method='POST' action="delete.php">    
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nome</th>
                        <th scope="col">status</th>
                        <th scope="col">email</th>
                        <th scope="col">password</th>
                        <th scope="col">status</th>
                        <th scope="col">button</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($linhas): ?>
                        <?php foreach ($resultado as $r): ?>
                            <tr>
                                <td><?= $r['alunoID'] ?></td>
                                <td><?= $r['nome'] ?></td>
                                <td><?= $r['status'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Não há dados</td>
                        </tr>
                    <?php endif; ?>

                <?php if($linhas):?>
                    <?php foreach($resultado as $r):?>
                    <tr>
                        <td><?= $r['id']?></td>
                        <td><?= $r['email']?></td>
                        <td><?= $r['password']?></td>
                        <td><?= $r['status']?></td>
                        <td>
                            <a type="button" class="btn btn-danger" href="delete.php?id=<?=$r['id'];?>">excluir</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php else:?>
                    <td colspan="1">Não há dados</td>
                    <td colspan="1">Não há dados</td>
                    <td colspan="1">Não há dados</td>
                    <td colspan="1">Não há dados</td>
                    <td colspan="1">Botão indisponivel</td>
                <?php endif;?>
                </tbody>
                </form>
            </table>
            
        </div>
    </div>
    
</body>

</html>