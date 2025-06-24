<?php

    require_once('BD.php');
    require_once('tarefa.php');

    $bd = (new BD())->conectarBD();
    $tarefa = new Tarefa($bd);
    $id_tarefa = $_POST['id_concluir'];
    $concluir = $tarefa->concluirTarefa($id_tarefa);

    if ($concluir == false)
    {
        header('Location: ../pagina_tarefas.php?concluir=0');
    }
    else
    {
        header('Location: ../pagina_tarefas.php?concluir=1');
    }
    
    
?>