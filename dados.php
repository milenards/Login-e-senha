<?php
// Informações de conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "bd_login";

// Criar conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}
?>

