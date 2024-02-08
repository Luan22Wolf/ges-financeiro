<?php
require "./config.php";

$sql = "SELECT * FROM receita";
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
    <form action="cadastrarReceita.php" method="get">
      <label>
        Descrição
        <input type="text" name="descricao" required>
      </label>

      <label>
        Valor
        <input type="number" name="valor" required>
      </label>

      <label>
        Categoria
        <select name="categoria">
          <option value="despesa">Despesa</option>
          <option value="receita">Receita</option>
        </select>
      </label>

      <label>
        Data
        <input type="date" name="data_mvto" required>
      </label>

      <button type="submit">Adicionar</button>

    </form>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Descrição</th>
          <th>Valor</th>
          <th>Data</th>
          <th>Categoria</th>
          <th>Opções</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dados as $dado) : ?>
          <tr>
            <td><?= $dado['id'] ?></td>
            <td><?= $dado['descricao'] ?></td>
            <td><?= $dado['valor'] ?></td>
            <td><?= $dado['data_mvto'] ?></td>
            <td><?= $dado['categoria_id'] ?></td>
            <td>
              <a href="./deletarReceita.php?id=<?= $dado['id'] ?>"><i class="btn-deletar fa-solid fa-trash"></i></a>
              <a href="./editarReceita.php?id=<?= $dado['id'] ?>" class="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="./status_pago.php?id=<?= $dado['id'] ?>" class="check"><i class="fi fi-br-check" a>
></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </main>
  <script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script>
</body>

</html>