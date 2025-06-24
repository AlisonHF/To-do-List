<?php 

    require_once('BD.php');
    require_once('tarefa.php');

    $conexao = (new BD())->conectarBD();
    $tarefa = new Tarefa($conexao);

    $descricao_alterada = $_POST['descricao'];
    $id_alteracao = $_POST['id_alteracao'];

    $tarefa->alterarTarefa($id_alteracao, $descricao_alterada);
    header('Location: ../pagina_tarefas.php?alterar=1');
    
?>