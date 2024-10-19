



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

            header("Location: index.php");
            exit(); 
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <form action="" method="POST" class="border p-4 shadow-sm rounded">
                <h2 class="text-center mb-4">Login</h2>

                
                <div class="form-outline mb-4">
                    <input type="text" id="username" class="form-control" name="username" required />
                    <label class="form-label" for="username">Username</label>
                </div>

             
                <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control" name="password" required />
                    <label class="form-label" for="password">Password</label>
                </div>

                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                    </div>

                    <div class="col text-right">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

               
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

          
                <div class="text-center">
                    <p>Not a member? <a href="#">Register</a></p>
                    <p>or sign up with:</p>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
