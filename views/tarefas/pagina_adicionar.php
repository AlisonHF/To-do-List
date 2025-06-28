 <?php
 
    require_once('assets/navbar.php'); 
    require_once('assets/menu_principal.php');

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
                <form method="POST" action="scripts/adicionar_tarefa.php" class="form-adicionar">
                    <h3 style="text-align: center;" class="mt-2 mb-4">Adicionar tarefa</h3>
                    <label class="form-label">Tarefa</label>
                    <textarea name="descricao" type="text" placeholder="Escreva aqui sua tarefa..." class="form-control" style="height: 100px;"></textarea>
                    <button class="btn btn-success mt-4 mb-2">Adicionar</button>
                </form>
            </div>
        </main>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>

</html>
