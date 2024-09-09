
<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validarSenhas();">
                <div class="container center">
                    <h1>Cadastro de Usuário</h1>
                    <label for="nome" class="form-label">Nome:</label><br>
                    <input type="text" class="form-control" id="nome" name="nome" required><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email" required><br><br>

                    <label for="senha">Senha:</label><br>
                    <input type="password" class="form-control" id="senha" name="senha" required><br><br>

                    <label for="confirmar_senha">Confirmar Senha:</label><br>
                    <input type="password" class="form-control" id="confirmar_senha" required><br><br>

                    <input type="submit" class="btn btn-success" value="Cadastrar">
                    <a href="inicio.php" class="btn btn-primary">Voltar</a>

                </div>
        </div>
    </div>
    </form>


</body>


<script src="script.js"></script>
</html>