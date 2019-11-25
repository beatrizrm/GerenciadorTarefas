<!DOCTYPE html>
<?php  include('Tarefa.php'); ?>
<html>
<head>
    <title>Altera Tarefa</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    
</head>
<body>
    <?php
        if (isset($_GET['editar'])) {
            $id = $_GET['editar'];
            
            $c = new Tarefa();
            $Tarefa = $c->consulta($id); 
            foreach($Tarefa as $lst_Tarefa) {
                $nome = $lst_Tarefa->getNome();
            } 
        }
    ?>    
    <h1 align="center">Alteração de Tarefa</h1>    
    <form method="post" action="TarefaAltera.php" >
        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
        if (isset($_POST['alterar'])) {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            
            $c = new Tarefa();
            $c->altera($nome, $id);

            header('location: TarefaLista.php');
        }
    ?>
</body>
</html>
