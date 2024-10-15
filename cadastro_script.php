<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body>
  
</body>
</html>

<?php 

include "conexao.php";


$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$validade = $_POST['validade'];


$sql = "INSERT INTO medicamentos (nome, preco, quantidade, categoria, validade) VALUES 
('$nome', '$preco', $quantidade, '$categoria', '$validade')";


if (mysqli_query($conn, $sql)) {
    echo "<p> $nome cadastrado com sucesso </p>";
} else 
    echo "Não foi cadastrado";


$sql = "SELECT * FROM medicamentos";

 
$dados = mysqli_query($conn, $sql);

if (mysqli_num_rows($dados) > 0) {
 
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Preço</th><th>Quantidade</th><th>Categoria</th><th>Data</th></tr>"; 

    while ($linha = mysqli_fetch_assoc($dados)) {
        echo "<tr>";
        foreach ($linha as $value) {
            echo "<td>" . $value . "</td>";      

        
    }
    echo "<td> <a href='editar.php?id=" . $linha['id'] . "'>Editar</a><br><br>";
    echo "<td> <a href='excluir.php?id=" . $linha['id'] . "'>Excluir</a><br><br>";
    echo "</tr>";  
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section> </section>
<a href='index.php'>Voltar</a>
</body>
</html>
