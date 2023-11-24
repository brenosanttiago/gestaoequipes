<?php
require '../dados/conexao.php';
session_start();

if (!isset($_SESSION["nome"])) {
    header("Location: ../visao/formAutenticar.php");
    exit();
}

$idTecnico = $_SESSION['tecnico_id'];
try {
    $consultaEquipes = $pdo->prepare('SELECT * FROM equipe WHERE tecnico_id = ?');
    $consultaEquipes->bindValue(1, $idTecnico);
    $consultaEquipes->execute();
    $equipes = $consultaEquipes->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro ao recuperar equipes: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Equipes</title>
</head>
<body>
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
                <h2>Equipes</h2>
            </div>
            <div class="col text-end">
                <a href="/gestaoequipes/visao/formCadastrarEquipe.php" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipes as $index => $equipe) : ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $equipe['nome']; ?></td>
                        <td>
                          <button class="btn btn-danger">Excluir</button>
                          <a href="/gestaoequipes/visao/formListarAtividades.php?equipe_id=<?php echo $equipe['equipe_id']; ?>" class="btn btn-success">Visualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
