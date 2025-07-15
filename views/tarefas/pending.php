<?php 
    // Get URL current page
    $path = explode('?', $_SERVER['REQUEST_URI']);
    $display_page = $path[0];
    $title = 'Tarefas Pendentes';
    
    ob_start();
?>

<?php if(empty($list)): ?>

    <h3>Sem tarefas pendentes!</h3>

<?php else: ?>

    <?php 
        include_once('layouts/card.php');
        include_once('layouts/modal.php');
    ?>

<?php endif; ?>

<?php 
    $content = ob_get_clean();
    require_once('layouts/template.php');
?>