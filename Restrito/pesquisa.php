<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php 

    $pesquisa = $_POST["busca"] ?? '';
    
    include "conexao.php";

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%' ";

    $dados = mysqli_query($conn, $sql);

    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                <nav class="navbar bg-body-tertiary">
                    <div class="container-fluid">
                        <form class="d-flex" role="search" action="pesquisa.php" method="post">
                            <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search"
                                name="busca" autofocus>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($linha = mysqli_fetch_assoc($dados)){
                            $cod_pessoa = $linha["cod_pessoa"];
                            $nome = $linha["nome"];
                            $endereco = $linha["endereco"];
                            $telefone = $linha["telefone"];
                            $email = $linha["email"];
                            $foto = $linha['foto'];
                            $data_nascimento = $linha["data_nascimento"];
                            $data_nascimento = mostra_data($data_nascimento);
                            $foto = $linha["foto"];
                            if(!$foto == null){
                                $mostra_foto = "<img src='img/$foto' class='lista_foto'>";
                            }else {
                                $mostra_foto = "";
                            }

                            echo " <tr>
                            <th>$mostra_foto</th>
                            <th scope='row'>$nome</th>                          
                            <td>$endereco</td>
                            <td>$telefone</td>
                            <td>$email</td>
                            <td>$data_nascimento</td>   
                            <td>
                            <a href='form_edit.php?id=$cod_pessoa' class='btn btn-outline-success'>Editar</a> 
                            <a href='#' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirma'
                            onclick = " . ' " ' . "pegar_dados($cod_pessoa, '$nome') " . ' " ' . ">Excluir</a> 
                            </td> 
                            </tr>";
                        }                       
                        ?>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-outline-success">Voltar</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de Exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="excluir_script.php" method="post">
                        <p>Deseja realmente excluir <b id="nome_pessoa"> Nome da pessoa</b> ?</p>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Não</button>
                    <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="submit" class="btn btn-outline-danger" value="Sim">
                    </form>    
                </div>
            </div>
        </div>
    </div>

     <script type="text/javascript">
        function pegar_dados(id, nome){
            document.getElementById("nome_pessoa") . innerHTML = nome;
            document.getElementById("nome_pessoa_1") . value = nome;
            document.getElementById("cod_pessoa") . value = id; 
        }
     </script>                 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>