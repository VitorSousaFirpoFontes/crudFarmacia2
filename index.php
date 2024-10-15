<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link href="style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

</head>
<section>
<body>
    <h1>Cadastro de medicamentos</h1>
    <br> 
   
    <form action="cadastro_script.php" method="POST" class="form-centralizado">
        <label for="nome">Nome do medicamento:</label>
        <input class="meuinput" type="text" id="nome" name="nome" required><br><br>

        <label for="descricao">Preço unitário:</label>
        <input class="meuinput" type="number" id="preco" name="preco" required></input><br><br>

        <label for="quantidade">Quantidade disponivel:</label>
        <input class="meuinput" type="number" step="0.01" id="quantidade" name="quantidade" required><br><br>

        <label for="quantidade">Categoria do remedio:</label>
        <input class="meuinput" type="text" id="categoria" name="categoria" required><br><br>
        <label for="quantidade">Data de validade:</label>
        <input class="meuinput" type="date" id="validade" name="validade" required><br><br>
        <input type="submit" value="Cadastrar medicamento">
    </form>
    <form action="pesquisar.php" method="GET">
    <input type="submit" value="Pesquisar" class="btn-pesquisar" />
    </form>
</section>
</body>
</html>
