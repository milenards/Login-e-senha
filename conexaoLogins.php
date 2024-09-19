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
    $empresa_id = $_POST['empresa_id']; // Certifique-se de que este valor seja passado corretamente no POST

    foreach ($plataformas as $plataforma) {
        // Atualize a instrução SQL para incluir a coluna empresa_id
        $sql = "INSERT INTO logins_rs(plataforma, login, senha, empresa_id) VALUES ('$plataforma', '$login', '$senha', '$empresa_id')";

        // Executa a instrução SQL
        if ($conexao->query($sql) === TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso para a plataforma $plataforma!');</script>";
        } else {
            echo "Erro ao cadastrar a plataforma $plataforma: " . $conexao->error;
        }
    }
}
?>
