<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de logins</title>
</head>
<body>
    <div class="background">
        <div class="container text-center login-box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validarSenhas();">
                <div class="container center">
                    <h1>Cadastrar login da empresa</h1>
                    <p>Plataforma:</p>                
                    <input type="checkbox" id="instagram" name="instagram" value="instagram">
                    <label for="instagram" required> instagram</label><br>                    <input type="checkbox" id="facebook" name="facebook" value="facebook">
                    <label for="facebook" required> Facebook</label><br>
                    <input type="checkbox" id="tiktok" name="tiktok" value="tiktok">
                    <label for="tiktok" required> Tiktok</label><br><br>

                    <label for="login">login:</label><br>
                    <input type="text" class="form-control" id="CNPJ" name="CNPJ"><br><br>

                    <label for="senha">senha:</label><br>
                    <input type="password" class="form-control" id="password" name="password"><br><br>

                    <input type="submit" class="btn btn-primary" value="Cadastrar">

                </div>
        </div>
    </div>
</html>

