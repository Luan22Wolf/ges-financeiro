<?php
require "./config.php";

$id = $_GET["id"];

$sql = "SELECT * FROM receita WHERE id = :id";
$sql = $pdo->prepare($sql);
$sql->bindValue(":id", $id);

$sql->execute();

$dado = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="retomar.png" type="image/x-icon">
  <link rel="stylesheet" href="./styles/style.css">
  <title>Receitas</title>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="mostrarCategoria.php">Categorias</a></li>
        <li><a href="receitas.php">Receitas</a></li>
        <li><a href="despesa.php">Despesas</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <form action="confirmarEdicaoReceita.php" method="get">
      <input type="hidden" name="id" value="<?= $dado['id']; ?>">
      <label>
        Descrição
        <input type="text" name="descricao" value="<?= $dado['descricao']; ?>" required>
      </label>

      <label>
        Valor
        <input type="number" name="valor" value="<?= $dado['valor']; ?>" required>
      </label>

      <label>
        Categoria
        <select name="categoria" value="Bonus">
          <option value="despesa">Despesa</option>
          <option value="receita">Receita</option>
        </select>
      </label>

      <label>
        Data
        <input type="date" name="data_mvto" value="<?= $dado['data_mvto'] ?>" required>
      </label>

      <button type="submit">Editar</button>

    </form>


  </main>
  <script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script>
</body>

</html>