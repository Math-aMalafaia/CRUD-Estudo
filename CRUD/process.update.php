<?php
include("config.php");

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$salary = $_POST['salary'];

$sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ssii", $name, $address, $salary, $id);
mysqli_stmt_execute($stmt);

header("Location: index.php");
?>
