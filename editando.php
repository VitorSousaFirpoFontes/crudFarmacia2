<?php 
include "conexao.php";


$id = $_POST['id'] ?? '';
$nome = $_POST['nome'] ?? '';
$preco = $_POST['preco'] ?? '';
$quantidade = $_POST['quantidade'] ?? '';
$categoria = $_POST['categoria'] ?? '';
$validade = $_POST['validade'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $sql = "UPDATE medicamentos SET nome='$nome', preco='$preco', quantidade='$quantidade', categoria='$categoria', validade='$validade' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success'>Editado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Não foi cadastrado: " . mysqli_error($conn) . "</div>";
    }
}


$sql = "SELECT * FROM medicamentos";
$dados = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Lista de Medicamentos</h1>

    <?php if (mysqli_num_rows($dados) > 0): ?>
        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysqli_fetch_assoc($dados)): ?>
                    <tr>
                        <td><?php echo $linha['id']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                        <td>
                            <a href='editar.php?id=<?php echo $linha['id']; ?>' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='excluir.php?id=<?php echo $linha['id']; ?>' class='btn btn-danger btn-sm'>Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
