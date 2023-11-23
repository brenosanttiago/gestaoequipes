<?php
require '../dados/conexao.php';

session_start();

if(isset($_SESSION["nome"])){
    $idTecnico = $_SESSION['tecnico_id'];

    $nomeEquipe = $_POST['nomeEquipe'];

    try {
   
        $consulta = $pdo->prepare('INSERT INTO equipe (nome, tecnico_id) VALUES (?, ?)');
        $consulta->bindValue(1, $nomeEquipe);
        $consulta->bindValue(2, $idTecnico);
        $consulta->execute();
        
        header('Location: ../visao/formListarEquipe.php');
        exit();
        
    } catch(PDOException $e){
        echo 'Erro ao cadastrar equipe: ' . $e->getMessage();
    }
}
?>