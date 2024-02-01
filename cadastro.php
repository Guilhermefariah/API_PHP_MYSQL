<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php 
                include "conexao.php";

                $nome = $_POST["nome"];
                $endereco = $_POST["endereco"];
                $telefone = $_POST["telefone"];
                $email = $_POST["email"];
                $data_nascimento = $_POST["data_nascimento"];

                $foto = $_FILES["foto"];
                $nome_foto = mover_foto($foto);
                if($nome_foto == 0 ){
                    $nome_foto = null;
                }
                
                $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, 
                `data_nascimento`, `foto`) VALUES ('$nome','$endereco','$telefone','$email',
                '$data_nascimento', '$nome_foto')";

                if(mysqli_query($conn, $sql)){
                    if($nome_foto != null ){
                        echo "<img src='img/$nome_foto' title='$nome_foto' class='mostra_foto'>";
                    }
                mensagem("$nome Cadastrado com sucesso!", 'success');
                }else {
                mensagem("$nome Nâo foi cadastrado!", 'danger');
                }
            ?>
            <a href="index.php" class="btn btn-outline-danger">Voltar</a>
        </div>
    </div>
</body>

</html>