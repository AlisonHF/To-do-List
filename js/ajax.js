/*function carregarConteudoAjax(url)
{
    let ajax = new XMLHttpRequest();
    div_conteudo = document.getElementById('conteudo');
    div_conteudo.innerHTML = '';

    ajax.open('GET', url);
    ajax.send();

    ajax.onreadystatechange = () =>
    {
        if (ajax.readyState === 4)
        {
            if (ajax.status === 400)
            {
                div_conteudo.innerHTML = ajax.responseText;
            }
            else
            {
                div_conteudo.innerHTML = 'Não foi possível carregar a página, tente novamente mais tarde...';
            }
        }
        
    }
}
*/