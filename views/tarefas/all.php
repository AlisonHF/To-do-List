<?php
    $status = '';
    $message_status = '';
    $title = 'Todas as tarefas';

    if (isset($_GET['status']))
    {
        if (isset($_GET['action']) && $_GET['action'] === 'delete'){
            switch ($_GET['status'])
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
        else if (isset($_GET['action']) && $_GET['action'] === 'complete')
        {
            switch ($_GET['status'])
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

        else if (isset($_GET['action']) && $_GET['action'] === 'update')
        {
            switch ($_GET['status'])
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
    }
    ob_start(); 
?>

<?php if(empty($list)): ?>
  <h3>Sem tarefas para exibir, adicione uma nova tarefa para vê-la aqui...</h3>
<?php else: ?>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach($list as $key => $register): ?>
        <div class="col"> 
            <div class="card h-100 card-task">
                <div class="card-body">
                    <h4><?= $register['descricao'] ?></h4>
                    <h6>
                        <?php
                            $date = date_create($register['data']);
                            $date = $date->format('d-m-Y');
                        ?>
                        <?= $date ?>
                    </h6>
                    <p>
                        <?php if ($register['id_status'] == 1): ?>
                            <span class="badge text-bg-warning">Pendente</span>
                        <?php elseif($register['id_status'] == 0): ?>
                            <span class="badge text-bg-success">Concluído</span>
                        <?php endif ?>
                    </p>
                    <div class="row-forms">
                        <form method="POST" action="/tarefas/delete" style="margin-right: 10px;">
                            <button class="btn btn-outline-danger" name="delete_id" value="<?= $register['id'] ?>" style="color: red;">
                                <i class="bi bi-x-square" style="color:red;"></i> Excluir
                            </button>
                        </form>
                        <?php if ($register['id_status'] == '1'): ?>
                            <form method="POST" action="/tarefas/edit" style="margin-right: 10px;">
                                <button class="btn btn-outline-dark" name="edit_id" value="<?= $register['id'] ?>">
                                <i class="bi bi-pencil-square"></i> Alterar
                                </button>
                            </form>
                            <form method="POST" action="/tarefas/complete" style="margin-right: 10px;">
                                <button class="btn btn-outline-success" name="complete_id" style="color: green;" value="<?= $register['id'] ?>">
                                <i class="bi bi-check-lg" style="color: green;"></i> Concluir
                                </button>
                            </form>
                            
                        <?php endif; ?>
                    </div>
                </div>   
                <div class="card-footer">
                    <small class="text-body-secondary">ID: <?= $register['id']; ?></small>
                </div>                   
            </div>
        </div>
    <?php endforeach; ?>
  </div>

<?php endif; ?>


<?php 
    $content = ob_get_clean();
    require_once('layouts/template.php');
?>
