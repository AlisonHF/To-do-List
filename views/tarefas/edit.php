<?php 
    $title = 'Alterar tarefa';
    ob_start();
 ?>
<form method="POST" action="/tarefas/update" class="standard-form">
    <h3 style="text-align: center;" class="mt-2 mb-4">Alterar tarefa</h3>
    <label class="form-label">Tarefa</label>
    <input type="number" name="edit_id" value=<?=$_POST['edit_id'] ?> hidden>
    <textarea name="descricao" type="text" placeholder="Altere sua tarefa..." class="form-control" style="height: 100px;"></textarea>
    <button class="btn btn-success mt-4 mb-2">Adicionar</button>
</form>

<?php 
    $content = ob_get_clean();
    require_once('layouts/template.php');
?>