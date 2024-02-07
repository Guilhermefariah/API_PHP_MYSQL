<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresa</title>
    <link rel="stylesheet" href="restrita/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="jumbotron">
                    <h1 class="display-4">Tela de Login</h1>
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" class="form-control" name="login" id="login" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Entre com seus dados de acesso.</div>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Lembrar dados</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>
                    <?php
                    if (isset($_POST["login"])) {
                        $login = $_POST["login"];
                        $senha = md5($_POST["senha"]);

                        include "restrito/conexao.php";
                        $sql = "SELECT * FROM `usuarios` WHERE login = '$login' AND senha = '$senha'";

                        if ($result = mysqli_query($conn, $sql)) {
                            $num_registros = mysqli_num_rows($result);
                            if ($num_registros == 1) {
                                $linha = mysqli_fetch_assoc($result);
                                if (($login == $linha["login"]) and ($senha == $linha["senha"])) {
                                    session_start();
                                    $_SESSION["user"] = "Gui";
                                    header("location: restrito");
                                } else {
                                    echo "login invalido!";
                                }
                            } else {
                                echo "Login ou senha inválidos ou não encontrados!";
                            }
                        }else{
                            echo "Nenhum resultado do banco de dados!";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>