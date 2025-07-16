<?php
    include_once('../vendor/autoload.php');
    
    use Src\Controller\TarefaController;

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $controller = new TarefaController();

    switch($uri)
    {
        case '/':
            $controller->index();
            break;
        case '/tarefas':
            $controller->index();
            break;
        case '/tarefas/create':
            $controller->create();
            break;
        case '/tarefas/all':
            $controller->all();
            break;
        case '/tarefas/store':
            $controller->store();
            break;
        case '/tarefas/delete':
            $controller->delete();
            break;
        case '/tarefas/complete':
            $controller->completeTask();
            break;
        case '/tarefas/edit':
            $controller->edit();
            break;
        case '/tarefas/update':
            $controller->update();
            break;
        default:
            $controller->index();
            break;
    }
?>