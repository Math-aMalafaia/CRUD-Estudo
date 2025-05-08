<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD - Lista de Funcionários</title>
</head>
<body>
    <h2>Funcionários</h2>
    <a href="create.php">Adicionar Novo</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Ações</th>
        </tr>
        <?php
        $sql = "SELECT * FROM employees";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['salary']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Editar</a>
                    <a href='delete.php?id={$row['id']}'>Excluir</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>