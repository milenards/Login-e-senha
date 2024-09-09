<?php
include 'conexaoEmp.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buscar os dados da empresa pelo ID
    $sql = "SELECT * FROM cad_emp WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Empresa não encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar os dados do formulário
    $razao_social = $_POST['razao_social'];
    $CNPJ = $_POST['CNPJ'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];

    // Atualizar os dados no banco
    $sql = "UPDATE cad_emp SET razao_social='$razao_social', CNPJ='$CNPJ', email='$email', celular='$celular' WHERE id=$id";

    if ($conexao->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso.";
        header("Location: visualizarEmp.php"); // Redireciona de volta para a lista de empresas
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro de Empresa</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <div class="container mt-5">
                <h1 class="text-center">Editar Cadastro de Empresa</h1>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="razao_social" class="form-label">Razão Social</label>
                        <input type="text" class="form-control" id="razao_social" name="razao_social" value="<?php echo $row['razao_social']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="CNPJ" class="form-label">CNPJ</label>
                        <input type="text" class="form-control" id="CNPJ" name="CNPJ" value="<?php echo $row['CNPJ']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $row['celular']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    <a href="inicio.php" class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>