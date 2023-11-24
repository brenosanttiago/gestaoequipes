<?php
require '../dados/conexao.php';
session_start();

if (!isset($_SESSION["nome"])) {
    header("Location: ../visao/formAutenticar.php");
    exit();
}

// Verificar se o ID da equipe foi recebido por parâmetro (exemplo: via GET ou POST)
if (isset($_GET['equipe_id'])) {
    $equipe_id = $_GET['equipe_id'];

    // Consulta para recuperar as atividades da equipe específica
    try {
        $consultaAtividades = $pdo->prepare('SELECT * FROM atividade WHERE equipe_id = ?');
        $consultaAtividades->bindValue(1, $equipe_id);
        $consultaAtividades->execute();
        $atividades = $consultaAtividades->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erro ao recuperar atividades: ' . $e->getMessage();
    }
} else {
    // Redirecionar para a página de listagem de equipes se o ID da equipe não estiver definido
    header("Location: formListarEquipe.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Atividades da Equipe</title>
</head>
<body>
<?php echo($equipe_id); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><?php echo($_SESSION["nome"]); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="/gestaoequipes/controle/CtrlSair.php">SAIR</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Atividades da Equipe</h2>
            </div>
            <div class="col text-end">
                <!-- Link para a página de cadastro de atividades -->
                <a href="../visao/formCadastrarAtividade.php?equipe_id=<?php echo $_GET['equipe_id']; ?>" class="btn btn-primary">Cadastrar Atividade</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Descrição</th>
                    <!-- Outras colunas de informações das atividades, se necessário -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($atividades as $index => $atividade) : ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $atividade['descricao']; ?></td>
                        <!-- Outras células com informações das atividades -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>