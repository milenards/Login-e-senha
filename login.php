<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <H1>Faça seu Login</H1>
    <div class="container text-center">

        <form action="verificar_login.php" method="post"> <!-- O arquivo verificar_login.php será responsável por verificar o login no banco de dados -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"> <!-- Adicionado o atributo name="email" -->
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha"> <!-- Adicionado o atributo name="senha" -->
            </div>

            <div class="mb-3 form-check">

                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>

    </div>

</body>


</html>
