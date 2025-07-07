<?php

    require_once __DIR__ . '/../Model/Tarefa.php';
    require_once __DIR__ . '/../utils/formatString.php';

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
            // Checks if any ordering was called
            $order_by = isset($_GET['order_by']) ?  $_GET['order_by'] : '';
            if (!empty($order_by))
            {
                switch($order_by)
                {
                    case 'date':
                        $list = $this->task->orderby('date-pending');
                        include $this->path_views . 'pending.php';
                        exit;
                    case 'alphabetic':
                        $list = $this->task->orderby('alphabetic-pending');
                        include $this->path_views . 'pending.php';
                        exit;
                }
            }
            else
            {
                $list = $this->task->getPendingTasks();
                include $this->path_views . 'pending.php';
            }   
            
        }

        public function create()
        {
            include $this->path_views . 'create.php';
        }

        public function store()
        {
            $description = $_POST['description'];
            $description = FormatDescription($description);

            if (strlen($description) < 3 || strlen($description) > 100)
            {
                header('Location: /tarefas/create?action=create&status=failed');
            }
            else 
            {
                $execute = $this->task->addTask($description);
                if ($execute == '0')
                {
                    header('Location: /tarefas/create?action=create&status=failed');
                    exit;
                }
                header('Location: /tarefas/create?action=create&status=success');
                exit;
            }

            
        }

        public function all()
        {
            // Checks if any ordering was called
            $order_by = isset($_GET['order_by']) ?  $_GET['order_by'] : '';
            if (!empty($order_by))
            {
                switch($order_by)
                {
                    case 'date':
                        $list = $this->task->orderby('date');
                        include $this->path_views . 'all.php';
                        exit;
                    case 'alphabetic':
                        $list = $this->task->orderby('alphabetic');
                        include $this->path_views . 'all.php';
                        exit;
                    case 'status':
                        $list = $this->task->orderby('status');
                        include $this->path_views . 'all.php';
                        exit;
                }
            }
            else
            {
                $list = $this->task->getTasks();
                include $this->path_views . 'all.php';
            }
            
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
            $description = FormatDescription($description);
            if (strlen($description) < 3 || strlen($description) > 100)
            {
                header('Location: /tarefas/all?action=update&status=failed');
                exit;
            }
            else
            {
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
    }
?>