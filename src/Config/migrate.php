<?php 

    $host = 'localhost';
    $db_name = 'to_do_list';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    try
    {
        $pdo = new PDO("mysql:host=$host;charset=$charset", $user, $pass);

        $init_db_query = 'create database if not exists to_do_list;';
        $init_table_query = 'create table if not exists tarefas(
                    id int not null auto_increment,
                    id_status int not null default 1, 
                    descricao varchar(200) not null,
                    data date,
                    primary key (id)
                    )';

        $pdo->query($init_db_query);
        $pdo->exec('USE to_do_list');
        $pdo->query($init_table_query);

        echo 'Banco de dados inicializado com sucesso!';

    }
    catch(PDOException $e)
    {
        echo 'Ocorreu um erro ao inicializar o banco de dados!<br/>' . 
        $e->getMessage() . 
        '<br/>' . 
        $e->getCode();
    }

?>