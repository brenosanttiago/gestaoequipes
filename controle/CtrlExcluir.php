<?php
// controlador_de_exclusao.php
require '../dados/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['equipe_id'])) {
        $equipe_id = $_POST['equipe_id'];

        try {
            // Prepara a query SQL para excluir a equipe com base no ID
            $sql = "DELETE FROM equipe WHERE equipe_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$equipe_id]);

            // Redireciona de volta para a página de listagem de equipes após a exclusão
            header("Location: ../visao/formListarEquipe.php");
            exit();
        } catch (PDOException $e) {
            echo 'Erro ao excluir equipe: ' . $e->getMessage();
        }
    } else {
        header("Location: ../visao/formListarEquipe.php");
        exit();
    }
}

?>