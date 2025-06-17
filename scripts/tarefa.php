<?php 

    class Tarefa {
        protected $conexao = null;

        function __construct($conexao)
        {
            $this->conexao = $conexao;

            $query_inicializadora = 'create table if not exists tarefas(
                    id int not null auto_increment,
                    descricao varchar(200) not null,
                    data date,
                    primary key (id)
            )';

            try
            {
                $stmt = $conexao->query($query_inicializadora);
            }
            catch(PDOException $e)
            {
                echo '<h3 style="color:red;">Ocorreu um erro para inicializar a tabela!</h3>';
                echo 'Código:' . $e->getCode() . '<br/>Mensagem: ' . $e->getMessage();
            }
        }

        function adicionarTarefa($descricao)
        {
            $descricao_salva = $descricao;
            $query = "insert into tarefas(descricao, data) values (:descricao, NOW())";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':descricao', $descricao_salva);
            $stmt->execute();
        }

        function imprimirTarefas() 
        {
            $query = "select * from tarefas";
            $stmt = $this->conexao->query($query);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }

        function alterarTarefa($id, $descricao)
        {
            $query = 'update tarefas set descricao = :descricao where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':descricao', $descricao);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        function excluirTarefa($id)
        {
            $query = 'delete from tarefas where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

    }

?>
