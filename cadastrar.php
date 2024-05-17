<?php
// Informações de conexão
$servidor = "localhost";
$usuario_db = "root";
$senha_db = "";
$banco = "bd_login";

// Criar conexão
$conexao = new mysqli($servidor, $usuario_db, $senha_db, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o email já está cadastrado
    $sql_verifica_email = "SELECT id FROM usuarios WHERE email='$email'";
    $resultado = $conexao->query($sql_verifica_email);

    if ($resultado->num_rows > 0) {
        // Se o email já existe, exibe uma mensagem de erro
        echo "<script>alert('Este email já está cadastrado.');</script>";
    } else {
        // Prepara a instrução SQL para inserção
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        // Executa a instrução SQL
        if ($conexao->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conexao->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function validarSenhas() {
            var senha = document.getElementById("senha").value;
            var confirmarSenha = document.getElementById("confirmar_senha").value;
            if (senha != confirmarSenha) {
                alert("As senhas precisam ser iguais.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validarSenhas();">
                <div class="container center">
                    <h1>Cadastro de Usuário</h1>
                    <label for="nome" class="form-label">Nome:</label><br>
                    <input type="text" class="form-control" id="nome" name="nome" required><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email" required><br><br>

                    <label for="senha">Senha:</label><br>
                    <input type="password" class="form-control" id="senha" name="senha" required><br><br>

                    <label for="confirmar_senha">Confirmar Senha:</label><br>
                    <input type="password" class="form-control" id="confirmar_senha" required><br><br>

                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
        </div>
    </div>
    </form>
</body>

</html>