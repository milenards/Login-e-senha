<?php
// Verifica se os campos de nome de usuário e senha foram enviados
if(isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Informações de conexão
    $servidor = "localhost";
    $usuario_bd = "seu_usuario";
    $senha_bd = "sua_senha";
    $banco = "nome_do_banco";

    // Cria uma conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario_bd, $senha_bd, $banco);

    // Verifica se houve erro na conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Proteção contra SQL Injection: Usando instrução preparada
    $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica se algum registro foi encontrado
    if ($resultado->num_rows > 0) {
        // Login bem-sucedido
        session_start();
        $_SESSION['username'] = $username;
        // Redireciona para a página de perfil do usuário, por exemplo
        header("Location: perfil.php");
        exit();
    } else {
        // Login falhou
        echo "Usuário ou senha inválidos.";
    }
} else {
    // Campos de usuário ou senha não foram enviados
    echo "Por favor, preencha todos os campos.";
}
?>
