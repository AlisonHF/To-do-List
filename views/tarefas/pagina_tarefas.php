<?php 
    require('scripts/BD.php');
    require_once('scripts/tarefa.php');
    require_once('assets/navbar.php');
?>

<?php if(isset($_GET['concluir']) && $_GET['concluir'] == 0): ?>
    <div class="bg-danger text-center">
        <h5>Essa tarefa já está concluída!</h5>
    </div>

<?php elseif(isset($_GET['concluir']) && $_GET['concluir'] == 1): ?>
    <div class="bg-success text-center">
        <h5>Tarefa concluída com sucesso!</h5>
    </div>
<?php endif ?>

<?php if(isset($_GET['alterar']) && $_GET['alterar'] == 1):?>
    <div class="bg-success text-center">
        <h5>Tarefa alterada com sucesso!</h5>
    </div>
<?php endif ?>

<?php if(isset($_GET['adicionar']) && $_GET['adicionar'] == 1):?>
    <div class="bg-success text-center">
        <h5>Tarefa adicionada com sucesso!</h5>
    </div>
<?php endif ?>

<?php if(isset($_GET['excluir']) && $_GET['excluir'] == 1):?>
    <div class="bg-success text-center">
        <h5>Tarefa excluída com sucesso!</h5>
    </div>
<?php endif ?>

<?php
    require_once('assets/menu_principal.php');

    $conexao = (new BD())->conectarBD();
    $tarefa = new Tarefa($conexao);

    $lista = $tarefa->recuperarTarefas();
    
?>

<html lang='pt-BR'>

    <head>
        <meta charset="UTF-8">
        <title>To-do-List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link href="assets/styles.css" rel="stylesheet">
    </head>
    <body>
                <!-- Conteúdo do menu -->
                <?php if(empty($lista)): ?>
                    <h3>Sem tarefas para exibir, adicione uma nova tarefa para vê la aqui...</h3>
                <?php else: ?>

                    <?php foreach($lista as $key => $registro): ?>
                        <div style="border: 1px solid white; margin-bottom: 10px; padding: 20px; border-radius: 20px;">
                            <p><?='ID tarefa: ' . $key + 1 . '<br/>' ?></p>
                            <p><?='Registrado na data: ' . $registro['data'] . '<br/>' ?></p>
                            <p>Status: <?=$registro['id_status'] == 1 ? 'Pendente' : 'Concluída' ?></p>
                            <hr/>
                            <p><?='Descricao: ' . $registro['descricao']?></p>
                            <hr/>
                            <form method="POST" action="scripts/excluir_tarefa.php">
                                <button class="btn" name="excluir" value=<?= $registro['id']?> style="color: red;"><i class="bi bi-x-square" style="color:red;"></i> Excluir</button>
                            </form>
                            <form method="POST" action="pagina_alterar.php">
                                <button class="btn text-white" name="id_alteracao" value=<?= $registro['id']?>><i class="bi bi-pencil-square"></i> Alterar</button>
                            </form>
                            <form method="POST" action="scripts/concluir_tarefa.php">
                                <button class="btn" name="id_concluir" style="color: green;" value=<?= $registro['id']?>><i class="bi bi-check-lg" style="color: green;"></i> Concluir</button>
                            </form>
                        </div>
                    <?php endforeach ?>
                
                <?php endif ?>
            </div>
        </main>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>

</html>
