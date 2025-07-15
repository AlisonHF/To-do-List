<div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 row-cols-xl-2 row-cols-xxl-3 g-4">
    <?php foreach($list as $key => $register): // Displays the task card ?>
        <div class="col"> 
            <div class="card h-100 card-task">

                <div class="card-body">
                    <h4><?= $register['descricao'] ?></h4>
                    <h6>
                        <?php
                            include_once('../src/utils/formatDate.php');
                            $date = formatDate($register['data']);
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

                        <form name="delete-form" method="POST" action="/tarefas/delete">
                            <button class="btn btn-outline-danger btn-options" value="<?= $register['id'] ?>">
                                <i class="bi bi-x-square" style="color:red;"></i> Excluir
                            </button>
                            <input name="delete_id" value=<?= $register['id'] ?> hidden>
                        </form>

                        <?php if ($register['id_status'] == '1'): ?>

                            <form name="edit-form" method="POST" action="/tarefas/edit">
                                <button class="btn btn-outline-dark btn-options" name="edit_id" value="<?= $register['id'] ?>">
                                    <i class="bi bi-pencil-square"></i> Alterar
                                </button>
                                <input name="description_update" value="<?= $register['descricao']?>" hidden>
                            </form>

                            <form name="complete-form" method="POST" action="/tarefas/complete">
                                <button class="btn btn-outline-success btn-options" value="<?= $register['id'] ?>">
                                    <i class="bi bi-check-lg"></i> Concluir
                                </button>
                                <input name="complete_id" value=<?= $register['id'] ?> hidden>
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