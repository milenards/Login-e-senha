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
        $empresa = $_POST['empresa'];
        $CNPJ = $_POST['CNPJ'];
        $email = $_POST['email'];
        $celular = $_POST['tel'];

        // Verifica se o CNPJ já está cadastrado
        $sql_verifica_cnpj = "SELECT id FROM cad_emp WHERE CNPJ='$CNPJ'";
        $resultado = $conexao->query($sql_verifica_cnpj);

        if ($resultado->num_rows > 0) {
            // Se o CNPJ já existe, exibe uma mensagem de erro
            echo "<script>alert('Este CNPJ já está cadastrado.');</script>";
        } else {
            // Prepara a instrução SQL para inserção
            $sql = "INSERT INTO cad_emp (razao_social, CNPJ, email, celular) VALUES ('$empresa', '$CNPJ', '$email', '$celular')";

            // Executa a instrução SQL
            if ($conexao->query($sql) === TRUE) {
                echo "Cadastro realizado com sucesso!";
            } else {
                echo "Erro ao cadastrar: " . $conexao->error;
            }
        }
    }

?>