<!DOCTYPE html>
<?php  include('Tarefa.php'); ?>
<html>
<head>
    <title>Altera Tarefa</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    
</head>
<body>
   
<h1 align="center" class="cadTaf">Alterar</h1>
    <form method="post" action="TarefaCadastra.php" >
    
     
        <div class="input-group">
            
            <button class="btn" name="listar" type="button" 
                    onclick="location.href='TarefaLista.php';">Listar
            </button>
        </div>
       
                    <legend>Progresso:</legend>
                    <label>
                        <input type="radio" name="progresso" value="20" checked />
                        Baixa
                        <input type="radio" name="progresso" value="40" />
                        Média
                        <input type="radio" name="progresso" value="80" />
                        Alta
                    </label>
                    <br />
                    <br />
                </fieldset>
                <label>
                    Tarefa concluída:
                    <input type="checkbox" name="concluida" value="sim" />
                    <br />
                    <br />
                </label> </div>
        <div class="input-group">
            <button class="btn" type="submit" name="alterar" style="background: #556B2F;" >Alterar</button>
        </div>
    </form>
    <?php
       if (isset($_POST['alterar'])) {
           $progresso = $_POST['progresso'];
           $concluido= $_POST['concluida'];
           
           $Tarefa = new Tarefa();
           $Tarefa->altera($progresso, $concluido);
           

            header('location: TarefaLista.php');
        }
    ?>
</body>
</html>
