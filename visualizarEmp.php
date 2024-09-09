<?php
include 'conexaoEmp.php';


$sql = "SELECT * FROM cad_emp ORDER BY id DESC";

$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de Cadastro de Empresas</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Empresas Cadastradas</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['razao_social']}</td>
                    <td>{$row['CNPJ']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['celular']}</td>
                    <td><a href='editEmp.php?id={$row['id']}' class='btn btn-primary'>Editar</a></td> <!-- Link de edição -->

                  </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhuma empresa cadastrada</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>
<script src="confirmDelete.js"></script>
</body>

</html>