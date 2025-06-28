
<div id="conteudo-principal">
    <main id="menu-principal">
        <ul class="nav flex-column menu-tarefas">
            <li>
                <a href="pagina_tarefas.php" class="link-menu btn" id="pagina_todas">Todas tarefas</a>
            </li>
            <li>
                <a href="pagina_pendentes.php" class="link-menu btn" id="pagina_pendentes">Tarefas pendentes</a>
            </li>
            <li>
                <a href="pagina_adicionar.php" class="link-menu btn" id="pagina_nova">Nova tarefa</a>
            </li>           
        </ul>

        <div id="conteudo" class="scroll-div overflow-auto p-3">

        <script>
            const PAGINA = window.location.pathname;
            console.log(PAGINA)

            if(PAGINA == '/To-do-List/pagina_adicionar.php')
            {
                botao = document.getElementById('pagina_nova');
                botao.className = "link-menu btn disabled";
            }
            else if(PAGINA == '/To-do-List/pagina_pendentes.php')
            {
                botao = document.getElementById('pagina_pendentes');
                botao.className = "link-menu btn disabled";
            }
            else if(PAGINA == '/To-do-List/pagina_tarefas.php')
            {
                botao = document.getElementById('pagina_todas');
                botao.className = "link-menu btn disabled";
            }
        </script>