<?php
//Abrir o banco 
include 'conexao.php';
//Preparando o comando
    $sql = "SELECT * FROM escola";
    $stmt = $pdo->prepare($sql);
    //Executar o comando
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $linhas = $stmt->rowCount();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro de Aluno</title>
    
</head>

<body>

    <h1 class="text-center text-white ">Mostrar Alunos</h1>
    <div class="container">
        <div class="border p-3 border-dark rounded bg-dark">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">email</th>
                        <th scope="col">password</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($linhas):?>
                    <?php foreach($resultado as $r):?>
                    <tr>
                        <td><?= $r['escolaID']?></td>
                        <td><?= $r['email']?></td>
                        <td><?= $r['password']?></td>
                        
                    </tr>
                <?php endforeach;?>
                <?php else:?>
                    <tr><td colspan="3">Não há dados</td></tr>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>