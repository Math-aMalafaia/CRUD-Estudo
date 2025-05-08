<?php include("config.php");
$id = $_GET['id'];
$sql = "SELECT * FROM employees WHERE id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionário</title>
</head>
<body>
    <h2>Editar Funcionário</h2>
    <form action="process.update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Address: <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
        Salary: <input type="number" name="salary" value="<?php echo $row['salary']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>