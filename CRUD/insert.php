<?php
include("config.php");
$name = $_POST['name'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ssi", $name, $address, $salary);
mysqli_stmt_execute($stmt);

header("Location: index.php"); // Redireciona para a lista
?>