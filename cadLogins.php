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
    $plataformas = $_POST['plataforma'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    foreach ($plataformas as $plataforma) {
        // Verifica se a plataforma já está cadastrada
        $sql_verifica_plataforma = "SELECT id FROM logins_rs WHERE plataforma='$plataforma'";
        $resultado = $conexao->query($sql_verifica_plataforma);

        if ($resultado->num_rows > 0) {
            // Se a plataforma já existe, exibe uma mensagem de erro
            echo "<script>alert('A plataforma $plataforma já está cadastrada.');</script>";
        } else {
            // Prepara a instrução SQL para inserção
            $sql = "INSERT INTO logins_rs(plataforma, login, senha) VALUES ('$plataforma', '$login', '$senha')";

            // Executa a instrução SQL
            if ($conexao->query($sql) === TRUE) {
                echo "<script>alert('Cadastro realizado com sucesso para a plataforma $plataforma!');</script>";
            } else {
                echo "Erro ao cadastrar a plataforma $plataforma: " . $conexao->error;
            }
        }
    }
}
?>
