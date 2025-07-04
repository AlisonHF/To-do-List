<?php

function getWarning($action, $status)
{

    if ($action === 'delete'){
        switch ($status)
        {
            case 'success':
                $status = 'success';
                $message_status = 'Tarefa excluída com sucesso!';
                break;
            case 'failed':
                $status = 'failed';
                $message_status = 'Não foi possível excluir a tarefa, tente novamente mais tarde!';
                break;
        }
    }
    
    else if ($action === 'complete')
    {
        switch ($status)
        {
            case 'success':
                $status = 'success';
                $message_status = 'Tarefa concluída com sucesso!';
                break;
            case 'failed':
                $status = 'failed';
                $message_status = 'Não foi possível concluír a tarefa, tente novamente mais tarde!';
                break;
        }
    }

    else if ($action === 'update')
    {
        switch ($status)
        {
            case 'success':
                $status = 'success';
                $message_status = 'Tarefa alterada com sucesso!';
                break;
            case 'failed':
                $status = 'failed';
                $message_status = 'Não foi possível alterar a tarefa, tente novamente mais tarde!';
                break;
        }
    }

    else if ($action === 'create')
    {
        switch ($status)
        {
            case 'success':
                $status = 'success';
                $message_status = 'Tarefa criada com sucesso!';
                break;
            case 'failed':
                $status = 'failed';
                $message_status = 'Não foi possível criar a tarefa, tente novamente mais tarde!';
                break;
        }
    }

    else 
    {
        $status = 'failed';
        $message_status = 'Ocorreu um erro ao mostrar o status';
    }

    return array($status, $message_status);
}

?>

