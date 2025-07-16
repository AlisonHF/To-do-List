<?php
    namespace src\utils;

    class Warning
    {
        public static function getWarning($get_action, $get_status)
        {
            $status = '';
            $message_status = '';

            if ($get_action === 'delete'){
                switch ($get_status)
                {
                    case 'success':
                        $status = 'success';
                        $message_status = 'Tarefa excluída com sucesso!';
                        break;
                    case 'failed':
                        $status = 'failed';
                        $message_status = 'Não foi possível excluir a tarefa, tente novamente mais tarde!';
                        break;
                }
            }
            
            else if ($get_action === 'complete')
            {
                switch ($get_status)
                {
                    case 'success':
                        $status = 'success';
                        $message_status = 'Tarefa concluída com sucesso!';
                        break;
                    case 'failed':
                        $status = 'failed';
                        $message_status = 'Não foi possível concluír a tarefa, tente novamente mais tarde!';
                        break;
                }
            }

            else if ($get_action === 'update')
            {
                switch ($get_status)
                {
                    case 'success':
                        $status = 'success';
                        $message_status = 'Tarefa alterada com sucesso!';
                        break;
                    case 'failed':
                        $status = 'failed';
                        $message_status = 'Não foi possível alterar a tarefa, tente novamente mais tarde!';
                        break;
                }
            }

            else if ($get_action === 'create')
            {
                switch ($get_status)
                {
                    case 'success':
                        $status = 'success';
                        $message_status = 'Tarefa criada com sucesso!';
                        break;
                    case 'failed':
                        $status = 'failed';
                        $message_status = 'Não foi possível criar a tarefa, tente novamente mais tarde!';
                        break;
                }
            }

            else 
            {
                $status = 'failed';
                $message_status = 'Ocorreu um erro ao mostrar o status';
            }

            return array($status, $message_status);
        }
    }
?>