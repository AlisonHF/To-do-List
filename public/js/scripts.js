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
                botao.className = 'link-menu btn disabled';
                break;
            case '/tarefas/all':
                botao = document.getElementById('pagina_todas');
                botao.className = 'link-menu btn disabled';
                break;
            case '/tarefas':
                botao = document.getElementById('pagina_pendentes');
                botao.className = 'link-menu btn disabled';
                break;
            case '/':
                botao = document.getElementById('pagina_pendentes');
                botao.className = 'link-menu btn disabled';
                break;
        }
    }
}



/* =======================================
    Function validate form
=======================================*/

function validateForm()
{
    let form = document.getElementById('edit-form');
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
                description_field.className = 'form-control';
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
        btn.innerHTML = '<i class="bi bi-arrow-down"></i>';
        btn.setAttribute('data-order','desc' );
        order_input.value = 'desc';
    }
    else
    {
        btn.innerHTML = '<i class="bi bi-arrow-up"></i>';
        btn.setAttribute('data-order', 'asc');
        order_input.value = 'asc';
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



/* =======================================
    Modal Bootstrap
=======================================*/

function setupModals()
{
    if (document.getElementById('modal'))
    {
        document.addEventListener('DOMContentLoaded', function ()
        {
            const confirmModal = new bootstrap.Modal(document.getElementById('modal'));
            const titleModal = document.getElementById('modal-title');
            const modalText = document.getElementById('modal-text');
            const confirmSubmitBtn = document.getElementById('confirm-submit'); 

            const deleteFormsNode = document.getElementsByName('delete-form');
            const deleteForms = [...deleteFormsNode];

            const completeFormsNode = document.getElementsByName('complete-form');
            const completeForms = [...completeFormsNode];

            const editForm = document.getElementById('edit-form');

            let formSubmit;

            if (editForm)
            {
                editForm.addEventListener('submit', function(event)
            {
                event.preventDefault();
                console.log('Localizou o editForm');
                titleModal.textContent = 'Alterar tarefa';
                modalText.textContent = 'Deseja alterar essa tarefa?';
                confirmSubmitBtn.textContent = 'Alterar';
                confirmSubmitBtn.className = 'btn btn-warning';

                confirmModal.show();
                formSubmit = editForm;
            });
                
            }

            
            completeForms.forEach(element => {
                element.addEventListener('submit', function(event)
                    {
                    event.preventDefault();

                    titleModal.textContent = 'Concluir tarefa';
                    modalText.textContent = 'Deseja concluir essa tarefa?';
                    confirmSubmitBtn.textContent = 'Concluir';
                    confirmSubmitBtn.className = 'btn btn-success';

                    confirmModal.show();
                    formSubmit = element;
                    }
                );
            });
            

            deleteForms.forEach(element => 
            {
                element.addEventListener('submit', function(event)
                {
                    event.preventDefault();

                    titleModal.textContent = 'Excluir tarefa';
                    modalText.textContent = 'Deseja excluir essa tarefa?';
                    confirmSubmitBtn.textContent = 'Excluir';
                    confirmSubmitBtn.className = 'btn btn-danger';

                    confirmModal.show();
                    formSubmit = element;
                });
            })
                
            confirmSubmitBtn.addEventListener('click', function()
            {
                if (formSubmit)
                {
                    confirmModal.hide();
                    formSubmit.submit();
                }
                
            });
        })
    }
}