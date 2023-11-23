<?php
// Verifica se os dados do formulário foram enviados via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../dados/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

    // Recebe os dados do formulário
    $equipe_id = $_POST['equipe_id'];
    $descricao = $_POST['descricao'];

    try {
        // Prepara a instrução SQL para inserir a atividade na tabela
        $stmt = $pdo->prepare('INSERT INTO atividades (descricao, equipe_id) VALUES (?, ?)');
        $stmt->execute([$descricao, $equipe_id]);

        // Redireciona de volta para a página de listagem de atividades da equipe
        header("Location: formListarAtividades.php?equipe_id=$equipe_id");
        exit();
    } catch (PDOException $e) {
        // Em caso de erro, exibe uma mensagem ou realiza alguma ação adequada
        echo 'Erro ao cadastrar atividade: ' . $e->getMessage();
    }
} else {
    // Se os dados não forem enviados via POST, redireciona de volta para a página de cadastro de atividades
    header("Location: formCadastroAtividade.php");
    exit();
}
?>
