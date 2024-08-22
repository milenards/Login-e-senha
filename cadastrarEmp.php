<?php
include 'conexaoEmp.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de empresas</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validarSenhas();">
                <div class="container center">
                    <h1>Cadastro de Empresas</h1>
                    <label for="empresa" class="form-label">Empresa:</label><br>
                    <input type="text" class="form-control" id="empresa" name="empresa" required><br><br>

                    <label for="CNPJ">CNPJ:</label><br>
                    <input type="text" class="form-control" id="CNPJ" name="CNPJ"><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email"><br><br>

                    <label for="tel">Celular</label><br>
                    <input type="tel" class="form-control" id="tel" name="tel"><br><br>

                    <input type="submit" class="btn btn-primary" value="Cadastrar">

                </div>
        </div>
    </div>
    </form>
</html>