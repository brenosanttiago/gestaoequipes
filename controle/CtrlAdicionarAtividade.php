<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../dados/conexao.php';
    session_start();

    if (!isset($_SESSION["nome"])) {
        header("Location: ../visao/formAutenticar.php");
        exit();
    }

    if (isset($_POST['equipe_id'], $_POST['descricao'])) {
        $equipe_id = $_POST['equipe_id'];
        $descricao = $_POST['descricao'];

        try {
            $stmt = $pdo->prepare('SELECT equipe_id FROM equipe WHERE equipe_id = ?');
            $stmt->execute([$equipe_id]);
            $equipe = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($equipe) {
                $consulta = $pdo->prepare('INSERT INTO atividade (descricao, equipe_id) VALUES (?, ?)');
                $consulta->execute([$descricao, $equipe_id]);

                header("Location: ../visao/formListarAtividades.php?equipe_id=$equipe_id");
                exit();
            } else {
                echo 'ID de equipe inválido.';
            }
        } catch (PDOException $e) {
            echo 'Erro ao cadastrar atividade: ' . $e->getMessage();
        }
    } else {
        echo 'Parâmetros ausentes.';
    }
} else {
    header("Location: ../visao/formCadastrarAtividade.php");
    exit();
}
?>
