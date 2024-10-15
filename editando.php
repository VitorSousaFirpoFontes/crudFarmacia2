<?php 

include "conexao.php";
$id = $_GET['id'] ?? '  ';
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$validade = $_POST['validade'];;


$sql = "UPDATE medicamentos SET nome='$nome', preco='$preco', quantidade='$quantidade', categoria='$categoria', validade='$validade' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Editado com sucesso";
} else {
    echo "Não foi cadastrado: " . mysqli_error($conn);
}


$sql = "SELECT * FROM medicamentos";

 
$dados = mysqli_query($conn, $sql);

if (mysqli_num_rows($dados) > 0) {
 
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Descricao</th><th>Senha</th></tr>"; 

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
<link href="style.css" rel="stylesheet" />
<body>
    
</body>
</html>
