<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro</h1>
                <form action="cadastro.php" method="post">
                    <div class="form-group col-md-6">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="number" class="form-control" name="telefone" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefone" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dt_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dt_nascimento" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>