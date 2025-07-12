<!DOCTYPE html>

<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <title><?= $title ?></title>
    </head>

    <body>

        <nav class="navbar" id="navigation-bar">
            <div class="container-fluid">
                <a href="#" class="navbar-brand" style="font-weight: bold; color:#45484b;"><i class="bi bi-file-text"></i> To-do-List</a>
            </div>

        </nav>

        <?php
            require_once('../src/utils/warning.php');

            if (isset($_GET['status']) && isset($_GET['action'])) // Warning message
            {
                $warning = getWarning($_GET['action'], $_GET['status']);
                $status = $warning[0]; // status
                $message_status = $warning[1]; // message
            }

            $path_request = explode('?', $_SERVER['REQUEST_URI']);
            $path =  ($path_request[0] === '/') ? '/tarefas' : $path_request[0];
            
        ?>

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
            <div class='div-aux'>
                <ul class="nav nav-tasks" id="nav-upper">
                    
                </ul>
                <main id="main-menu">
                    <ul class="nav flex-column options-menu">
                        <li>
                            <a href="/" class="link-menu btn" id="pagina_pendentes">Tarefas pendentes</a>
                        </li>
                        <li>
                            <a href="/tarefas/all" class="link-menu btn" id="pagina_todas">Todas tarefas</a>
                        </li>
                        <li>
                            <a href="/tarefas/create" class="link-menu btn" id="pagina_nova">Nova tarefa</a>
                        </li>
                        
                        <?php if(isset($display_page)): ?>
                            <li id="li-order">
                                <h6 class="mb-3">Ordenar</h6>

                                <form method="GET" action="<?= $path ?>">
                                    <div id="div-order">
                                        <select name="order_by" id="select-order">
                                            <option value="" selected disabled>Tipo</option>
                                            <option value="alphabetic">Ordem alfabética</option>
                                            <?php if ($display_page == '/tarefas/all'): ?>
                                                <option value="status">Por status</option>
                                            <?php endif; ?>
                                            <option value="date">Por data</option>
                                        </select>

                                        <button type="button" id="btn-asc-desc" class="btn btn-warning" onclick="classify()" data-order="desc"
                                         data-bs-toggle="popover" data-bs-title="Dica de ordenação" data-bs-custom-class="custom-popover"
                                            data-bs-content="Seta para cima: Ordem crescente <br/>Seta para baixo: Ordem decrescente">
                                            <i class="bi bi-arrow-down"></i>
                                        </button>
                                        <input type="text" name="order" id="order" value="desc" hidden>
                                    </div>
                                    
                                    <button id="btn-order" class="btn btn-warning">Ordenar</button>
                                </form>
                            </li>
                    <?php endif; ?>
                    </ul>

                    
                    <div id="content" class="scroll-div overflow-auto">
                        <?= $content ?>
                    </div>
                </main>
                <ul class="nav nav-tasks" id="nav-footer"></ul>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script>
            MainMenu.markActiveButton();
            activatePopovers();
            setupModals();
        </script>
    </body>
</html>
