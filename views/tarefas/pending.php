<?php 
    // Get URL current page
    $path = explode('?', $_SERVER['REQUEST_URI']);
    $current_page = $path[0];

    ob_start();
?>

<?php if(empty($list)): ?>
    <h3>Sem tarefas pendentes!</h3>
<?php else: ?>

    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-3 g-4">

    <?php foreach($list as $key => $register): // Displays the task card ?>
        <div class="col"> 
            <div class="card h-100 card-task">
                <div class="card-body">
                    <h4><?= $register['descricao'] ?></h4>
                    <h6>
                        <?php
                            $date = date_create($register['data']);
                            $date = $date->format('d/m/Y');
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
                        <form method="POST" action="/tarefas/delete">
                            <button class="btn btn-outline-danger btn-options" name="delete_id" value="<?= $register['id'] ?>" >
                                <i class="bi bi-x-square" style="color:red;"></i> Excluir
                            </button>
                        </form>
                        <?php if ($register['id_status'] == '1'): ?>
                            <form method="POST" action="/tarefas/edit">
                                <button class="btn btn-outline-dark btn-options" name="edit_id" value="<?= $register['id'] ?>">
                                <i class="bi bi-pencil-square"></i> Alterar
                                </button>
                                <input name="description_update" value="<?= $register['descricao']?>" hidden>
                            </form>
                            <form method="POST" action="/tarefas/complete">
                                <button class="btn btn-outline-success btn-options" name="complete_id" value="<?= $register['id'] ?>">
                                <i class="bi bi-check-lg"></i> Concluir
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

<?php endif ?>

<?php 
    $title = 'Tarefas Pendentes';
    $content = ob_get_clean();
    require_once('layouts/template.php');
?>
