<!DOCTYPE html>
<?php  include('Tarefa.php'); ?>
<html>
<head>
    <title>Cadastro de Tarefa</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h1 align="center" class="cadTaf">Cadastro de Tarefa</h1>
    <form method="post" action="TarefaCadastra.php" >
        <div class="input-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="">
        </div>
        <div class="input-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="">
        </div>
        <div class="input-group">
            <label>Prazo:</label>
            <input type="date" name="prazo" value="">
        </div>
        <div class="input-group">
            <label>Prioridade:</label>
            <input type="number" name="prioridade" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='TarefaLista.php';">Listar
            </button>
        </div>
    </form>
    <?php
        if (isset($_POST['cadastrar'])) {
           $nome = $_POST['nome'];
           $descricao = $_POST['descricao'];
           $prazo = $_POST['prazo'];
           $prioridade = $_POST['prioridade'];
           
           $Tarefa = new Tarefa();
           $Tarefa->insere($nome,$descricao,$prazo, $prioridade);
           

            header('location: TarefaLista.php');
        }
    ?>
</body>
</html>