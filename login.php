<?php
include('conexao.php');

if (isset($_POST['username']) || isset($_POST['password'])) {
    if (strlen($_POST['username']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['password']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $conn->real_escape_string($_POST['username']);
        $senha = $conn->real_escape_string($_POST['password']);

        // Corrigindo a consulta SQL com aspas corretamente fechadas
        $sql_code = "SELECT * FROM usuarios WHERE username = '$email' AND password = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na conexão: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['user'] = $usuario['id'];
            $_SESSION['name'] = $usuario['nome'];

            header("Location: painel.php");
            exit(); // Certifique-se de sair após o redirecionamento
        } else {
            echo "Falha ao logar. Usuário ou senha incorretos.";
        }
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
<form action="index.php" method="POST" class="form-centralizado">
        <label for="username">Usuário:</label>
        <input class="username" type="text" id="username" name="username" required><br><br>

        <label for="password">Senha:</label>
        <input class="password" type="password" id="password" name="password" required></input><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>