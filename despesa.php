<?php
require "./config.php";

$sql = "SELECT * FROM despesa";
$sql = $pdo->prepare($sql);
$sql->execute();

$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT SUM(valor) as valor FROM despesa";
$sql = $pdo->prepare($sql);
$sql->execute();
$total_receita = $sql->fetch(PDO::FETCH_ASSOC);

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
            <li><a href="mostrarCategoria.php">Categoria</a></li>
            <li><a href="receitas.php">Receita</a></li>
            <li><a href="despesa.php">Despesa</a></li>
        </ul>
    </nav>
</header>

<main>
    <span class="total">
      <p>Total de Receita: R$<?= $total_receita["valor"]?></p>
    </span>
    <form action="cadastrarDespesa.php" method="get">
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
            <th>Descrição &#x1F4DD;</th>
            <th>Valor &#x1F4B2;</th>
            <th>Data &#x1F4C5;</th>
            <th>Categoria &#x1F354;</th>
            <th>Opções &#x2699;</th>
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
                    <!-- Adicionando a confirmação -->
                    <a href="./deletarDespesa.php?id=<?= $dado['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta despesa?');">
                        <i class="btn-deletar fa-solid fa-trash"></i>
                    </a>
                    <a href="./editarDespesa.php?id=<?= $dado['id'] ?>" class="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>
<script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script>
</body>

</html>
