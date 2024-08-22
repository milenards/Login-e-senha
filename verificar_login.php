<?php
// Verifica se os campos de nome de usuário e senha foram enviados
if(isset($_POST['email'], $_POST['senha'])) {
    $username = $_POST['email'];
    $password = $_POST['senha'];

    // Informações de conexão
    $servidor = "localhost";
    $usuario_bd = "root";
    $senha_bd = "";
    $banco = "bd_login";

    // Cria uma conexão com o banco de dados
    $conexao = new mysqli($servidor, $usuario_bd, $senha_bd, $banco);

    // Verifica se houve erro na conexão
    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Proteção contra SQL Injection: Usando instrução preparada
    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica se algum registro foi encontrado
    if ($resultado->num_rows > 0) {
        // Login bem-sucedido
        session_start();
        $_SESSION['email'] = $username;
        // Redireciona para a página de perfil do usuário, por exemplo
        header("Location: inicio.php");
        exit();
    } else {
        // Login falhou
        echo "<script>alert('Usuário ou senha inválidos.');</script>";
        header("refresh:0;url=login.php");
    }
} else {
    // Campos de usuário ou senha não foram enviados
    echo "Por favor, preencha todos os campos.";
}
?>