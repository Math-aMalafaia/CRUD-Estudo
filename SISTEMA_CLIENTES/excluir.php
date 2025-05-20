<?php
include 'includes/conexao.php';

if (isset($_GET['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        header('Location: index.php?status=sucesso&msg=Cliente excluído com sucesso');
    } catch (PDOException $e) {
        header('Location: index.php?status=erro&msg=Erro ao excluir cliente');
    }
    exit;
}

header('Location: index.php');
exit;
?>