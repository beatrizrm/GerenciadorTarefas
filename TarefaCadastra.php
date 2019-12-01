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
            <button class="btn" type="submit" name="cadastrar" >Cadastrar</button>
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='TarefaLista.php';">Listar
            </button>
        </div>
        <div class="input-group">
         
                          <fieldset>
                    <legend>Prioridade:</legend>
                    <label>
                        <input type="radio" name="prioridade" value="baixa" checked />
                        Baixa
                        <input type="radio" name="prioridade" value="media" />
                        Média
                        <input type="radio" name="prioridade" value="alta" />
                        Alta
                    </label>
                    <br />
                    <br />
                </fieldset>
            <fieldset>
                    <legend>Progresso:</legend>
                    <label>
                        <input type="radio" name="progresso" value="20" checked />
                        20
                        <input type="radio" name="progresso" value="40" />
                        40
                        <input type="radio" name="progresso" value="80" />
                       80
                    </label>
                    <br />
                    <br />
                </fieldset>
                <label>
                    Tarefa concluída:
                    <input type="checkbox" name="concluida" value="sim" />
                    <br />
                    <br />
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </div>
    <?php
        if (isset($_POST['cadastrar'])) {
           $nome = $_POST['nome'];
           $descricao = $_POST['descricao'];
           $prazo = $_POST['prazo'];
           $prioridade = $_POST['prioridade'];
           $concluido= $_POST['concluida'];
           $progresso = $_POST['progresso'];
           
           $Tarefa = new Tarefa();
           $Tarefa->insere($nome,$descricao,$prazo, $prioridade,$concluido, $progresso);
           

            header('location: TarefaLista.php');
        }
    ?>
</body>
</html>
