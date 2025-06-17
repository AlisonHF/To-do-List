<?php 
    require_once('BD.php');
    require_once('tarefa.php');
    $id_exclusão = $_POST['excluir'];
    
    $conexao = (new BD())->conectarBD();
    $tarefa = new Tarefa($conexao);

    $tarefa->excluirTarefa($id_exclusão);
    header('Location: ../index.php');
?>