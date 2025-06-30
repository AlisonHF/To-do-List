<?php

    require_once __DIR__ . '/../Model/Tarefa.php';

    class TarefaController
    {
        private $task;
        private $path_views = __DIR__ . '/../../views/tarefas/';

        public function __construct()
        {
            $this->task = new Task();
        }

        public function index()
        {
            $list = $this->task->getPendingTasks();
            include $this->path_views . 'pending.php';
        }

        public function create()
        {
            include $this->path_views . 'create.php';
        }

        public function store()
        {
            $description = $_POST['description'];
            $execute = $this->task->addTask($description);
            if ($execute == '0')
            {
                header('Location: /tarefas/create?status=failed');
                exit;
            }
            header('Location: /tarefas/create?status=success');
            exit;
        }

        public function all()
        {
            $list = $this->task->getTasks();
            include $this->path_views . 'all.php';
        }

        public function delete()
        {
            $delete_id = $_POST['delete_id'];
            $this->task->deleteTask($delete_id);
            header('Location: /tarefas/all?action=delete&status=success');
            exit;
        }

        public function completeTask()
        {
            $complete_id = $_POST['complete_id'];
            $complete = $this->task->completeTask($complete_id);
            if ($complete === false)
            {
                header('Location: /tarefas/all?action=complete&status=failed');
                exit;
            }
            header('Location: /tarefas/all?action=complete&status=success');
            exit;
        }

        public function edit()
        {
            include $this->path_views . 'edit.php';
        }

        public function update()
        {
            $update_id = $_POST['edit_id'];
            $description = $_POST['descricao'];
            $execute = $this->task->updateTask($update_id, $description);
            if ($execute == '0')
            {
                header('Location: /tarefas/all?action=update&status=failed');
                exit;
            }
            header('Location: /tarefas/all?action=update&status=success');
            exit;
        }
    }
?>