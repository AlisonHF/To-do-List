<?php

    require_once __DIR__ . '/../Model/Tarefa.php';

    class TarefaController
    {
        private $tarefa;

        public function __construct()
        {
            $tarefa = new Tarefa();
        }

        public function index()
        {
            include __DIR__ . '/../../views/tarefas/index.php';
        }
    }
?>