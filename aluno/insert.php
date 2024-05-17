<?php
$nome = trim($_POST['Nome']);
$presenca = trim($_POST['Presenca']);

include '../conexao.php';

try {
    // Abrir a conexão
    $sql = "INSERT INTO aluno VALUES(NULL, :nome, :presenca);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':presenca', $presenca);
    $resposta = $stmt->execute();
} catch (PDOException $e) {
    $resposta = $e->getMessage();
}
header("location: insertAluno.php?resposta=" . $resposta);
