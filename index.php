<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link href="style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
    <section>
        <h1>Cadastro de Medicamentos</h1>
        <br> 
        <form action="cadastro_script.php" method="POST" class="form-centralizado">
            <label for="nome">Nome do medicamento:</label>
            <input class="meuinput" type="text" id="nome" name="nome" required>

            <label for="preco">Preço unitário:</label>
            <input class="meuinput" type="number" id="preco" name="preco" required>

            <label for="quantidade">Quantidade disponível:</label>
            <input class="meuinput" type="number" step="0.01" id="quantidade" name="quantidade" required>

            <label for="categoria">Categoria do remédio:</label>
            <input class="meuinput" type="text" id="categoria" name="categoria" required>

            <label for="validade">Data de validade:</label>
            <input class="meuinput" type="date" id="validade" name="validade" required>

            <input type="submit" value="Cadastrar medicamento" class="btn-pesquisar">
        </form>
        <form action="pesquisar.php" method="GET" class="form-centralizado">
            <input type="submit" value="Pesquisar medicamento" class="btn-pesquisar" />
        </form>
    </section>

</body>
</html>
