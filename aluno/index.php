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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

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
                            <th scope="col">Botão</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($linhas): ?>
                            <?php foreach ($resultado as $r): ?>
                                <tr>
                                    <td><?= $r['alunoID'] ?></td>
                                    <td><?= $r['nome'] ?></td>
                                    <td><?= $r['status'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletarModal">
                                            Deletar
                                        </button>
                                        <div class="modal fade" id="deletarModal" tabindex="-1"
                                            aria-labelledby="deletarModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="deletarModalLabel">Deletar</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Fechar"></button>
                                                    </div>
                                                    <div class="modal-body text-dark">
                                                        Deseja mesmo deletar? <br>
                                                        <strong>(Esse processo é irreversível.)</strong>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <a type="button" class="btn btn-danger"
                                                            href="delete.php?id=<?= $r['alunoID']; ?>">Deletar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">Não há dados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </form>
            </table>

        </div>
    </div>
    <script src="modal.js"></script>
</body>

</html>