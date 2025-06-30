<?php
    $status = '';
    $message_status = '';

    if (isset($_GET['status']))
    {
        switch ($_GET['status'])
        {
            case 'success':
                $status = 'success';
                $message_status = 'Tarefa adicionada com sucesso!';
                break;
            case 'failed':
                $status = 'failed';
                $message_status = 'Não foi possível salvar a tarefa, tente novamente mais tarde!';
                break;
        }
    }

    $title = 'Adicionar Tarefa';
    ob_start();
?>

<form method="POST" action="/tarefas/store" class="standard-form">
    <h3 style="text-align: center;" class="mt-2 mb-4">Adicionar tarefa</h3>
    <label class="form-label">Tarefa</label>
    <textarea name="description" type="text" placeholder="Escreva aqui sua tarefa..." class="form-control" style="height: 100px;"></textarea>
    <button class="btn btn-success mt-4 mb-2">Adicionar</button>
</form>

<?php
    $content = ob_get_clean();
    require_once('layouts/template.php');
?>
