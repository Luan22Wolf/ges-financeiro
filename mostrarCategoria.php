<?php
require "./config.php";

$sql = "SELECT * FROM categoria";
$sql = $pdo->prepare($sql);
$sql->execute();


$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Receitas</title>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="mostrarCategoria.php">categoria</a></li>
        <li><a href="receitas.php">receita</a></li>
        <li><a href="despesa.php">despesa</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <form action="adcionarCategoria.php" method="get">
      <label>
        Descrição
        <input type="text" name="descricao" required>
      </label>

      <button type="submit">Adicionar</button>

    </form>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Descrição</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dados as $dado) : ?>
          <tr>
            <td><?= $dado['id'] ?></td>
            <td><?= $dado['descrição'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </main>
  <script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script>
</body>

</html>