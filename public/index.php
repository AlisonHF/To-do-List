<?php

    require_once __DIR__ . '/../src/Controller/TarefaController.php';

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $controller = new TarefaController();

    if ($uri === '/' || $uri === '/tarefas')
    {
        $controller->index();
    }

?>