<?php

require "./config.php";

if (isset($_GET['descricao']) && !empty($_GET['descricao'])) {
  $descrição = $_GET['descricao'];
}

$descrição = $_GET['descricao'];


$sql = "INSERT INTO categoria(descrição) VALUES 
(:descricao)";
$sql = $pdo->prepare($sql);

$sql->bindValue(":descricao", $descrição);


$sql->execute();

header("Location: mostrarCategoria.php");
exit;
