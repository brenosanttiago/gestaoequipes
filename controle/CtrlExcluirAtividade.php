<?php
// controlador_de_exclusao.php
require '../dados/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['atividade_id'])) {
        $atividade_id = $_POST['atividade_id'];

        try {
            // Excluir a atividade com base no ID
            $sql = "DELETE FROM atividade WHERE atividade_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$atividade_id]);

            // Redireciona de volta para a página de listagem de atividades após a exclusão
            header("Location: ../visao/formListarAtividades.php");
            exit();
        } catch (PDOException $e) {
            echo 'Erro ao excluir atividade: ' . $e->getMessage();
        }
    } else {
        header("Location: ../visao/formListarAtividades.php");
        exit();
    }
}
?>