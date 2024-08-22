<?php
include 'conexaoLogins.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de logins</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validarSenhas();">
                <div class="container center">
                    <h1>Cadastrar login e senha da empresa</h1>
                    <p>Plataforma:</p>
                    <input type="checkbox" id="instagram" name="plataforma[]" value="instagram">
                    <label for="instagram"> instagram</label><br>
                    <input type="checkbox" id="facebook" name="plataforma[]" value="facebook">
                    <label for="facebook"> Facebook</label><br>
                    <input type="checkbox" id="tiktok" name="plataforma[]" value="tiktok">
                    <label for="tiktok"> Tiktok</label><br><br>

                    <label for="login">login:</label><br>
                    <input type="text" class="form-control" id="login" name="login" required><br><br>

                    <label for="senha">senha:</label><br>
                    <input type="password" class="form-control" id="senha" name="senha" required><br><br>

                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
