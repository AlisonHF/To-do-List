<h1>Site To-do-List</h1>

<p>Atividade proposta pelo curso: Desenvolvimento WEB completo</p>
<p><b>Objetivo:</b> Desenvolver um site de gerenciamento de tarefas usando banco de dados MySql e PHP</p>
<p>Site feito com a biblioteca Bootstrap v5.3.6 para total responsividade.</p>

<h2>Pré requisito</h2>
<ul>
<li>Necessário instalação do [XAMPP](https://www.apachefriends.org/index.html)</li>
</ul>
<h3>Como executar com o XAMPP</h3>
<ul>
  <li>Copie os arquivos do projeto para onde desejar</li>
  <li>Inicie o XAMPP e ative o módulo 'APACHE' e 'MYSQL'.</li>
  <li>Configure o PHP no PATH do sistema caso não esteja configurado</li>
  <li>Vá até a pasta src/Config pelo CMD e aplique o comando para inicializar o banco de dados e as tabelas: <pre>php migrate.php</pre></li>
  <li>Vá até a pasta public pelo CMD e aplique o comando: <pre>php -S localhost:8080</pre></li>
  <li>Abra o navegador e acesse: localhost:8080</li>
</ul>

<h2>Sobre</h2>
<p>O projeto To-do-List foi realizado para prática de CRUD usando MySql e PHP, sendo possível gerenciar suas tarefas diárias. </p>

<h2>Funcionalidades</h2>
<ul>
  <li>Inclusão de tarefas no banco de dados</li>
  <li>Alterações na descrição das tarefas</li>
  <li>Exclusão de tarefas</li>
  <li>Consulta e leitura de todas as tarefas e de tarefas pendentes</li>
  <li>Conclusão de tarefas</li>
  <li>Ordenação de tarefas</li>
  <li>Telas de modal interativas para melhor experiência do usuário</li>
</ul>

<h2>Telas do site</h2>

<h3>Página Todas tarefas</h3>
<img src="https://raw.githubusercontent.com/AlisonHF/To-do-List/refs/heads/main/images/all_tasks.png">

<h3>Página Tarefas Pendentes</h3>
<img src="https://raw.githubusercontent.com/AlisonHF/To-do-List/refs/heads/main/images/pending_tasks.png">

<h3>Página Adicionar tarefa</h3>
<img src="https://raw.githubusercontent.com/AlisonHF/To-do-List/refs/heads/main/images/add_task.png">
