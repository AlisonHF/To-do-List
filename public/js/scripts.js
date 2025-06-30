class MainMenu
{
    static markActiveButton()
    {
        const PAGE = window.location.pathname;
        let botao;

        switch(PAGE)
        {
            case '/tarefas/create':
                botao = document.getElementById('pagina_nova');
                botao.className = "link-menu btn disabled";
                break;
            case '/tarefas/all':
                botao = document.getElementById('pagina_todas');
                botao.className = "link-menu btn disabled";
                break;
            case '/tarefas':
                botao = document.getElementById('pagina_pendentes');
                botao.className = "link-menu btn disabled";
                break;
            case '/':
                botao = document.getElementById('pagina_pendentes');
                botao.className = "link-menu btn disabled";
                break;
        }
    }
}
