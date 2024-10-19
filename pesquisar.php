<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" />
    <title>Pesquisa de Medicamentos</title>
</head>
<body class="container mt-5">
    <h1>Pesquisa de Medicamentos</h1>
    <form action="pesquisar.php" method="POST" class="mb-4">
        <div class="form-group">
            <label for="termo">Digite o termo de pesquisa:</label>
            <input type="text" class="form-control" id="termo" name="busca" placeholder="Digite algo...">
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
        <br> <a href='index.php' class='btn btn-primary'>Voltar</a>
    </form>

    <?php 
    if (isset($_POST['busca'])) {
        $pesquisa = $_POST['busca'];
    } else {
        $pesquisa = '';
    }

    include "conexao.php";
    
    $sql = "SELECT * FROM medicamentos WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);

    if (mysqli_num_rows($dados) > 0) {
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>";
        echo "<tbody>";

        while ($linha = mysqli_fetch_assoc($dados)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
         
            echo "<td>
                    <a href='editar.php?id=" . $linha['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='excluir.php?id=" . $linha['id'] . "' class='btn btn-danger btn-sm'>Excluir</a>
                  </td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
    ?>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>

</html>
