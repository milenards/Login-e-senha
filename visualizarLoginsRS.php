<?php
include 'conexaoLogins.php';

if (isset($_GET['id'])) {
    $empresa_id = $_GET['id'];

    // Modifique a consulta SQL para buscar apenas os logins da empresa selecionada
    $sql = "SELECT * FROM logins_rs WHERE empresa_id = ? ORDER BY id DESC";

    $stmt = $conexao->prepare($sql);
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }
    $stmt->bind_param("i", $empresa_id);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "ID da empresa não fornecido!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logins de redes sociais cadastrados</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <div class="container mt-5">
                <h1 class="text-center">Logins de redes sociais cadastrados</h1>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Plataforma</th>
                            <th>Login</th>
                            <th>Senha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['plataforma']}</td>
                                    <td>{$row['login']}</td>
                                    <td>{$row['senha']}</td>
                                    <td><button type='button' onclick='confirmarExclusao({$row['id']})' class ='btn btn-danger' title='Excluir'>Excluir</button></td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>Nenhum login cadastrado para esta empresa</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="visualizarEmp.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
    <script src="confirmDeleteUsuarios.js"></script>
  
</body>

</html>
