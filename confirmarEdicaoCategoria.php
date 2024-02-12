<?php
require "./config.php";

$id = $_GET['id'];
$descricao = $_GET['descricao'];



$sql = "UPDATE categoria SET
descricao = :descricao,
WHERE id = :id";

$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);
$sql->bindValue(":descrição", $descricao);
$sql->execute();

header("Location: mostrarCategoria.php");
exit;
