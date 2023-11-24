<?php
require '../dados/conexao.php';

// Verifica se o ID da equipe foi passado via GET
if(isset($_GET['equipe_id'])){
    // Obtém o ID da equipe
    $equipe_id = $_GET['equipe_id'];
} else {
    // Se o ID da equipe não estiver presente, redireciona para a página anterior
    header("Location: ../visao/formListarEquipe.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro de Atividade</title>
</head>
<body>
<?php echo($equipe_id); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/gestaoequipes/visao/formListarAtividades.php">Voltar</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3">
                    <h4 class="card-title text-center">Cadastro de Atividade</h4>
                    <div class="card-body">
                        <form action="/gestaoequipes/controle/CtrlAdicionarAtividade.php" method="post">
                            <input type="hidden" name="equipe_id" value="<?php echo htmlspecialchars($_GET['equipe_id'] ?? '', ENT_QUOTES); ?>">
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição da Atividade</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" required>
                            </div>
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
