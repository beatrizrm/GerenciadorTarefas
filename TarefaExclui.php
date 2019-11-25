<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php  include('Tarefa.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if (isset($_GET['excluir'])) {
                $nome = $_GET['excluir'];
            
                $c = new Tarefa();
                $resp = $c->exclui($nome);

                header('location: TarefaLista.php?exclusao='.$resp);
            }
        ?>
    </body>
</html>
