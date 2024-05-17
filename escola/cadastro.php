<?php
$nome = trim($_POST['Nome']);
$email = trim($_POST['Email']);
$endereco = trim($_POST['Endereco']);
$telefone = trim($_POST['Telefone']);
$senha = trim($_POST['Senha']);
$tipo = trim($_POST['Tipo']);

if ($tipo == 'Pública') {
    $tipo = 1;
}
else{
    $tipo = 0;
}
include 'conexao.php';

try {
    // Abrir a conexão
    $pdo = new PDO('mysql:host=localhost;dbname=pit', 'root', '');
    $sql = "INSERT INTO escola VALUES(NULL, :nome, :email, :endereco, :telefone, :senha, :tipo);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':tipo', $tipo);
    $resposta = $stmt->execute();
} catch (PDOException $e) {
    $resposta = $e->getMessage();
}
header("location: cadastroescola.php?resposta=" . $resposta);
