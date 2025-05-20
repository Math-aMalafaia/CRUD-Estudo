<?php
include 'includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $data_nascimento = $_POST['data_nascimento'] ?: null;

    try {
        if ($id) {
            // Atualizar cliente existente
            $stmt = $pdo->prepare("UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ?, data_nascimento = ? WHERE id = ?");
            $stmt->execute([$nome, $email, $telefone, $endereco, $data_nascimento, $id]);
        } else {
            // Inserir novo cliente
            $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone, endereco, data_nascimento) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $email, $telefone, $endereco, $data_nascimento]);
        }

        header('Location: index.php?status=sucesso');
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            header('Location: index.php?status=erro&msg=Email já cadastrado');
        } else {
            header('Location: index.php?status=erro');
        }
        exit;
    }
}

header('Location: index.php');
exit;
?>