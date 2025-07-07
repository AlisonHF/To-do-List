<?php
    $title = 'Adicionar Tarefa';
    ob_start();
?>

<form method="POST" action="/tarefas/store" class="standard-form" id="form">
    <h3 style="text-align: center;" class="mt-2 mb-4">Adicionar tarefa</h3>
    <label class="form-label">Tarefa</label>
    <textarea id="description" name="description" type="text" placeholder="Escreva aqui sua tarefa..." class="form-control" style="height: 100px;" required="required" minlength="1" maxlength="100"></textarea>
    <label id="required-info" hidden="hidden">A descrição da tarefa deve ter entre 3 e 100 caracteres.</label>
    <button id="button-submit" class="btn btn-success mt-4 mb-2">Adicionar</button>
</form>


<?php
    $content = ob_get_clean();
    require_once('layouts/template.php');
?>

<script>validateForm()</script>