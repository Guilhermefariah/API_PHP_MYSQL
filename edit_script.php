<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALtereção de Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php 
                include "conexao.php";
                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $endereco = $_POST["endereco"];
                $telefone = $_POST["telefone"];
                $email = $_POST["email"];
                $data_nascimento = $_POST["data_nascimento"];


                $sql = "UPDATE `pessoas` SET nome= '$nome', endereco= '$endereco', telefone = '$telefone', email = '$email', data_nascimento = '$data_nascimento' WHERE cod_pessoa = $id";
                
            if(mysqli_query($conn, $sql)){
                mensagem("$nome Alterado com sucesso!", 'success');
            }else {
                mensagem("$nome Nâo foi alterado!", 'danger');
            }
            ?>
            <a href="index.php" class="btn btn-outline-danger">Voltar</a>
        </div>
    </div>
</body>

</html>