
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro de Atividade</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/caminho/para/formListarAtividades.php">Voltar</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3">
                    <h4 class="card-title text-center">Cadastro de Atividade</h4>
                    <div class="card-body">
                        <form action="/caminho/para/acaoDeCadastroAtividade.php" method="post">
                            <input type="hidden" name="equipe_id" value="<?php echo $_GET['equipe_id']; ?>">
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição da Atividade</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required>
                            </div>
                            <!-- Outros campos de formulário, se necessário -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
