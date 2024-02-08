<?php

$name = "hg5pss68_attds_amarelo";
$host = "5ps.site";
$user = "hg5pss68_amarelo";
$pass = "1y{u(iI(KxvG";


try {
  $pdo = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
} catch (PDOException $e) {
  echo "ERRO NA CONEXÃO: " . $e->getMessage();
}
