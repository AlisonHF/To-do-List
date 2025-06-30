<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
        <title><?= $title ?></title>

    </head>
    <body>

        <nav class="navbar" id="navigation-bar">
            <div class="container-fluid">
                <a href="#" class="navbar-brand" style="font-weight: bold; color:#45484b;"><i class="bi bi-file-text"></i> To-do-List</a>
            </div>
        </nav>

        <?php if(isset($status)): ?>
            <?php switch ($status): 
                case 'success': ?>
                    <div class="status-success"><?= $message_status ?></div>
                    <?php break; 
                case 'failed': ?> 
                    <div class="status-failed"><?= $message_status ?></div>
                    <?php break; 
            endswitch; ?>
        <?php endif; ?>
        
        <div id="main-content">
            <main id="main-menu">
                <ul class="nav flex-column task-menu">
                    <li>
                        <a href="/" class="link-menu btn" id="pagina_pendentes">Tarefas pendentes</a>
                    </li>
                    <li>
                        <a href="/tarefas/all" class="link-menu btn" id="pagina_todas">Todas tarefas</a>
                    </li>
                    <li>
                        <a href="/tarefas/create" class="link-menu btn" id="pagina_nova">Nova tarefa</a>
                    </li>           
                </ul>

                <div id="content" class="scroll-div overflow-auto p-3">
                    <?= $content ?>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script>MainMenu.markActiveButton();</script>
    </body>
</html>
