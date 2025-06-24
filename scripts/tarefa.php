<?php 

    class Tarefa {
        protected $bd = null;

        function __construct($bd)
        {
            $this->bd = $bd;

            $query_inicializadora = 'create table if not exists tarefas(
                    id int not null auto_increment,
                    id_status int not null default 1, 
                    descricao varchar(200) not null,
                    data date,
                    primary key (id)
            )';

            try
            {
                $bd->query($query_inicializadora);
            }
            catch(PDOException $e)
            {
                echo '<h3 style="color:red;">Ocorreu um erro para inicializar a tabela!</h3>';
                echo 'Código:' . $e->getCode() . '<br/>Mensagem: ' . $e->getMessage();
            }
        }

        public function adicionarTarefa($descricao)
        {
            $descricao_salva = $descricao;
            $query = "insert into tarefas(descricao, data) values (:descricao, NOW())";
            $stmt = $this->bd->prepare($query);
            $stmt->bindValue(':descricao', $descricao_salva);
            $stmt->execute();
        }

        public function recuperarTarefas() 
        {
            $query = "select * from tarefas";
            $stmt = $this->bd->query($query);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function alterarTarefa($id, $descricao)
        {
            $query = 'update tarefas set descricao = :descricao where id = :id';
            $stmt = $this->bd->prepare($query);
            $stmt->bindValue(':descricao', $descricao);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        public function excluirTarefa($id)
        {
            $query = 'delete from tarefas where id = :id';
            $stmt = $this->bd->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        public function recuperarTarefasPendentes() 
        {
            $query = "select * from tarefas where id_status = 1";
            $stmt = $this->bd->query($query);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        public function concluirTarefa($id)
        {
            $query_verificadora = 'select id_status from tarefas where id = :id';
            $stmt = $stmt = $this->bd->prepare($query_verificadora);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($resultado['id_status'] == 0)
            {
                return false;
            }

            $query = 'update tarefas set id_status = :status where id = :id';
            $stmt = $this->bd->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':status', 0);
            $stmt->execute();

            return true;

        }

    }

?>
