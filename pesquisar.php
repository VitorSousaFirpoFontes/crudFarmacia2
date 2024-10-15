<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<form action="pesquisar.php" method="POST">
        <label for="termo">Digite o termo de pesquisa:</label><br>
        <input type="text" id="termo" name="busca" placeholder="Digite algo..."><br><br>
        <input type="submit" value="Pesquisar">
    </form>

    <?php 
    
if (isset($_POST['busca'])) {
	$pesquisa = $_POST['busca'];
	} else {
	$pesquisa= '  ';
}

include "conexao.php";
    
$sql = "SELECT * FROM produtos WHERE nome LIKE '%$pesquisa%'";

 
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
</body>
</html>