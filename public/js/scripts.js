/* =======================================
    Class Main Menu
=======================================*/
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



/* =======================================
    Function validate form
=======================================*/

function validateForm()
{
    let form = document.getElementById('form');
    let description_field = document.getElementById('description');
    let label_info = document.getElementById('required-info');

    form.addEventListener(
        'focusout',
        function (event)
        {
            if (description_field.value.length < 3)
            {
                label_info.hidden = '';
                description_field.className += ' input-error';
                console.log('Erro descrição');
            }
            else
            {
                label_info.hidden = 'hidden';
                description_field.className = "form-control";
            }
        }
    );

    form.addEventListener(
        'submit',
        function (event)
        {
            if (description_field.value.length < 3)
            {
                event.preventDefault();
            }
        }
    );
}



/* =======================================
    Function Classify
=======================================*/

function classify()
{
    const btn = document.getElementById('btn-asc-desc');
    const order_input = document.getElementById('order');
    
    if (btn.getAttribute('data-order') == 'asc')
    {
        btn.innerHTML = "<i class='bi bi-arrow-down'></i>";
        btn.setAttribute('data-order','desc' );
        order_input.value = 'desc';
        console.log('indo para desc');
    }
    else
    {
        btn.innerHTML = "<i class='bi bi-arrow-up'></i>";
        btn.setAttribute('data-order', 'asc');
        order_input.value = 'asc';
        console.log('indo para asc');
        
    }

}



/* =======================================
    Tooltip Bootstrap
=======================================*/

function activatePopovers()
{
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl, {
        trigger: 'hover',
        html: true
    }))


}