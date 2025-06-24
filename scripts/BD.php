<?php
    class BD
    {
        private $host = 'localhost';
        private $db_name = 'to_do_list';
        private $usuario = 'root';
        private $senha = '';
        private $conexao = null;

        public function conectarBD() // Retorna o paramêtro de conexão do banco de dados
        {
            try
            {
                if ($this->conexao === null)
                {
                    $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->usuario, $this->senha);
                }
            }
            catch(PDOException $e)
            {
                echo 'Erro ao conectar no banco de dados: ' . $e->getCode() . '<br/>' . 'Mensagem: ' . $e->getMessage();
            }
            
            return $this->conexao;
        }

        // Para conectar com o banco de dados, é necessário setar uma váriavel com = (new BD())->conectarBD();
    }
?>