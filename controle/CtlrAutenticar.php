<?php
    require '../dados/conexao.php';
    session_start();
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    // Crie uma consulta preparada com um parâmetro
    $stmt = $pdo->prepare('SELECT nome,tecnico_id FROM autenticação WHERE email = ? AND senha = ?');

    // Associe um valor ao parâmetro
    $stmt->bindValue(1, $email);
    $stmt->bindValue(2, $senha);

    // Execute a consulta
    $stmt->execute();

    // Obtenha os resultados
    $resultados = $stmt->fetchAll();

    foreach ($resultados as $linha) {
       
        $nome = $linha['nome'];
        $id = $linha['tecnico_id'];
        $_SESSION["nome"] = $nome;
        $_SESSION["tecnico_id"] = $id;
        header("Location: ../visao/formListarEquipe.php"); // faça algo com as colunas
    }

?>
