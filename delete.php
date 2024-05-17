<?php
include 'conexao.php';

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $stmt = $pdo->prepare('DELETE FROM escola WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

header("location: index.php");
?>