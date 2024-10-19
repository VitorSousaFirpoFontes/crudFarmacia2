<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<?php     
include "conexao.php";
$id = $_GET['id'] ?? '  ';
$sql = "SELECT * FROM medicamentos WHERE id = $id";

$dados = mysqli_query($conn, $sql);

$linha = mysqli_fetch_assoc($dados);
?>

<form action="editando.php" method="POST" class="form-centralizado">
    <label for="nome">Nome do Medicamento:</label>
    <input type="text" id="nome" name="nome" required value="<?php echo $linha['nome']; ?>"><br><br>

    <label for="preco">Preço Unitário:</label>
    <input type="number" step="0.01" id="preco" name="preco" required value="<?php echo $linha['preco']; ?>"><br><br>

    <label for="quantidade">Quantidade em Estoque:</label>
    <input type="number" id="quantidade" name="quantidade" required value="<?php echo $linha['quantidade']; ?>"><br><br>

    <label for="categoria">Categoria do Medicamento:</label>
    <input type="text" id="categoria" name="categoria" required value="<?php echo $linha['categoria']; ?>"><br><br>

    <label for="validade">Data de Validade:</label>
    <input type="date" id="validade" name="validade" required value="<?php echo $linha['validade']; ?>"><br><br>

    <input type="submit" value="Atualizar Medicamento">
    <input type="hidden" name='id' value="<?php echo $linha['id']; ?>">
</form>


</body>
</html>