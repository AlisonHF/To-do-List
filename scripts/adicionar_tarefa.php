 <?php
 
    require_once('BD.php');
    require_once('tarefa.php');

    if (isset($_POST['descricao']))
    {
        $conexao = (new BD())->conectarBD();
        $tarefa = new Tarefa($conexao);

        $descricao = $_POST['descricao'];
        $tarefa->adicionarTarefa($descricao);
        header('Location: ../index.php');
    }
?>
