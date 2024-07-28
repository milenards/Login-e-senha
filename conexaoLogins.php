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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $plataforma = $_POST['plataforma[]'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];


    $sql = "INSERT INTO logins_rs(plataforma, login, senha) VALUES ('$plataforma', '$login', '$senha')";

    // Executa a instrução SQL
    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
}
