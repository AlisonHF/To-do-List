<?php 

    require_once __DIR__ . '/../Config/Database.php';

    class Task {
        protected $pdo = null;

        function __construct()
        {
            $this->pdo = Database::getConnection();

            $query_inicializadora = 'create table if not exists tarefas(
                    id int not null auto_increment,
                    id_status int not null default 1, 
                    descricao varchar(200) not null,
                    data date,
                    primary key (id)
            )';

            try
            {
                $this->pdo->query($query_inicializadora);
            }
            catch(PDOException $e)
            {
                echo '<h3 style="color:red;">Ocorreu um erro para inicializar a tabela tarefas!</h3>';
                echo 'Código:' . $e->getCode() . '<br/>Mensagem: ' . $e->getMessage();
            }
        }

        public function addTask(string $description)
        {
            $add_description = $description;
            $query = "insert into tarefas(descricao, data) values (:descricao, NOW())";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':descricao', $add_description);
            $execute = $stmt->execute();
            return $execute;
        }

        public function getTasks() 
        {
            $query = "select id, id_status, descricao, data from tarefas
                order by data desc";
            $stmt = $this->pdo->query($query);
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        public function updateTask(int | string $id, string $description)
        {
            $query = 'update tarefas set descricao = :descricao where id = :id';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':descricao', $description);
            $stmt->bindValue(':id', $id);
            $execute = $stmt->execute();
            return $execute;
        }

        public function deleteTask(int | string $id)
        {
            $query = 'delete from tarefas where id = :id';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        public function getPendingTasks() 
        {
            $query = "select id, id_status, descricao, data from tarefas where id_status = 1
                order by data desc";
            $stmt = $this->pdo->query($query);
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }

        public function completeTask(int | string $id)
        {
            $query = 'select id_status from tarefas where id = :id';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result['id_status'] == 0)
            {
                return false;
            }

            $query = 'update tarefas set id_status = :status where id = :id';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':status', 0);
            $stmt->execute();

            return true;
        }

        public function orderby(string $order_by, string $order)
        {
            switch($order_by)
            {
                case 'date':
                    $query = "select id, id_status, descricao, data from tarefas
                        order by data $order";
                    break;
                case 'alphabetic':
                    $query = "select id, id_status, descricao, data from tarefas
                        order by descricao $order";
                    break;
                case 'status':
                    $query = "select id, id_status, descricao, data from tarefas
                    order by id_status $order";
                    break;
                case 'date-pending':
                    $query = "select id, id_status, descricao, data from tarefas
                        where id_status = 1
                        order by data $order";
                    break;
                case 'alphabetic-pending':
                    $query = "select id, id_status, descricao, data from tarefas
                        where id_status = 1
                        order by descricao $order";
                    break;
            }
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        }
    }
?>
