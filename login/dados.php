<?php
$email = trim($_POST['email']);
$password = trim($_POST['senha']);

if (!isset($email) || !isset($password)) {
    die('Email and password are required.');
}

include '../conexao.php';

try {
    $sql = "SELECT * FROM escola WHERE email = :email AND Senha = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $resposta = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resposta) > 0) {
        header("location: ../aluno/index.php");
    } else {
        header("location: login.php?erro=" . "1");
    }
} catch (PDOException $e) {
    $resposta = $e->getMessage();
    var_dump($resposta);
}
?>