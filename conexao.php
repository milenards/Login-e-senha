
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

