<?php
include 'conexaoLogins.php';

if (isset($_GET['id'])) {
    $empresa_id = $_GET['id'];
} else {
    echo "Empresa não especificada.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Logins</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function validarSenhas() {
            var senha = document.getElementById("senha").value;

            if (senha.length < 6) {
                alert("A senha deve ter pelo menos 6 caracteres.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="background">
        <div class="container text-center login-box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $empresa_id; ?>" onsubmit="return validarSenhas();">
                <div class="container center">
                    <h1>Cadastrar login e senha da empresa</h1>


                    <input type="hidden" name="empresa_id" value="<?php echo $empresa_id; ?>">

                    <p>Plataforma:</p>
                    <input type="checkbox" id="instagram" name="plataforma[]" value="instagram">
                    <label for="instagram"> Instagram</label><br>
                    <input type="checkbox" id="facebook" name="plataforma[]" value="facebook">
                    <label for="facebook"> Facebook</label><br>
                    <input type="checkbox" id="tiktok" name="plataforma[]" value="tiktok">
                    <label for="tiktok"> Tiktok</label><br><br>

                    <label for="login">Login:</label><br>
                    <input type="text" class="form-control" id="login" name="login" required><br><br>

                    <label for="senha">Senha:</label><br>
                    <input type="password" class="form-control" id="senha" name="senha" required><br><br>

                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                    <a href="visualizarEmp.php" class="btn btn-primary">Voltar</a>
                </div>
            </form>

        </div>
        </form>
    </div>
    </div>
</body>

</html>