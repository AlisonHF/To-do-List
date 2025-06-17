<?php 

    require('scripts/BD.php');
    require_once('scripts/tarefa.php');
    require_once('assets/navbar.php'); 
    require_once('assets/menu_principal.php');

    $conexao = (new BD())->conectarBD();
    $tarefa = new Tarefa($conexao);

    $lista = $tarefa->imprimirTarefas();
    
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
                <?php foreach($lista as $key => $registro): ?>
                    <p><?='Tarefa: ' . $key + 1 . '<br/>' ?></p>
                    <p><?='Registrado na data: ' . $registro['data'] . '<br/>' ?></p>
                    <p><?='Descricao: ' . $registro['descricao']?></p>
                    <form method="POST" action="scripts/excluir_tarefa.php">
                        <button class="btn" name="excluir" value=<?= $registro['id']?>><i class="bi bi-x-square" style="color:red;"></i></button>
                    </form>
                    <form method="POST" action="pagina_alterar.php">
                        <button class="btn" name="id_alteracao" value=<?= $registro['id']?>><i class="bi bi-pencil-square"></i></button>
                    </form>
                    <hr/>
                <?php endforeach ?>
            </div>
        </main>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>

</html>
