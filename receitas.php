<?php
require "./config.php";

$sql = "SELECT * FROM receita";
$sql = $pdo->prepare($sql);
$sql->execute();

$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT SUM(valor) as valor FROM receita";
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
    <title>Gerenciador Financeiro</title>
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
    <select name="categoria" required>        
        <?php foreach ($dados as $dado) : ?>
            <option value="<?= $dado['id'] ?>"><?= $dado['descricao'] ?></option>
        <?php endforeach; ?>
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
        <?php
        // Inicializar o contador de IDs das linhas
        $linha_id = 1;
        ?>
        <?php foreach ($dados as $dado) : ?>
            <tr id="linha<?= $linha_id ?>">
                <td><?= $linha_id ?></td>
                <td><?= $dado['descricao'] ?></td>
                <td><?= $dado['valor'] ?></td>
                <td><?= $dado['data_mvto'] ?></td>
                <td><?= $dado['categoria_id'] ?></td>
                <td>                  
                    <a href="./deletarReceita.php?id=<?= $dado['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta receita?');">
                        <i class="btn-deletar fa-solid fa-trash"></i>
                    </a>
                    <a href="./editarReceita.php?id=<?= $dado['id'] ?>" class="btn-editar"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#=<?= $dado['id'] ?>" class="check">&#x2713;</a>
                    <a href="#=<?= $dado['id'] ?>" class="x">&#x2717;</a>
                </td>
            </tr>
            <?php 
            // Incrementar o contador de IDs das linhas
            $linha_id++; 
            ?>
        <?php endforeach; ?>
        </tbody>
    </table>

</main>
<script src="https://kit.fontawesome.com/561265e797.js" crossorigin="anonymous"></script>
</body>

</html>
