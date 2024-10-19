<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Medicamentos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" />
</head>
<body class="container mt-5">

<?php 
include "conexao.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? '';
    $quantidade = $_POST['quantidade'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $validade = $_POST['validade'] ?? '';

    $sql = "INSERT INTO medicamentos (nome, preco, quantidade, categoria, validade) VALUES 
    ('$nome', '$preco', $quantidade, '$categoria', '$validade')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>$nome cadastrado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar: " . mysqli_error($conn) . "</div>";
    }
}

$sql = "SELECT * FROM medicamentos";
$dados = mysqli_query($conn, $sql);

if (mysqli_num_rows($dados) > 0) {
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>ID</th><th>Nome</th><th>Preço</th><th>Quantidade</th><th>Categoria</th><th>Data de Validade</th><th>Ações</th></tr></thead>";
    echo "<tbody>";
    while ($linha = mysqli_fetch_assoc($dados)) {
        echo "<tr>";
        echo "<td>" . $linha['id'] . "</td>";
        echo "<td>" . $linha['nome'] . "</td>";
        echo "<td>" . $linha['preco'] . "</td>";
        echo "<td>" . $linha['quantidade'] . "</td>";
        echo "<td>" . $linha['categoria'] . "</td>";
        echo "<td>" . $linha['validade'] . "</td>";
        echo "<td>
                <a href='editar.php?id=" . $linha['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                <a href='excluir.php?id=" . $linha['id'] . "' class='btn btn-danger btn-sm'>Excluir</a>
              </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p class='alert alert-info'>Nenhum medicamento cadastrado.</p>";
}
?>

<a href='index.php' class='btn btn-primary'>Voltar</a>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
