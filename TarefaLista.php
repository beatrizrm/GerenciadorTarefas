<!DOCTYPE html>

-->
<?php  include('Tarefa.php'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript">//<![CDATA[

    window.onload=function(){
      
const range = document.querySelector('#range'),
	progressbar = document.querySelector('.progress-bar');
  
  
range.addEventListener('input', function(){
	const value = range.value;
  progressbar.style.setProperty('--progress', value)
})

    }

  //]]></script>

    </head>
    <body>
        <div>
        <table>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Descrição:</th>
                    <th>Prazo:</th>
                    <th>Prioridade:</th>
                    <th colspan="2">Ação</th>
                    
                </tr>
            </thead>
            <h1 align="center">Lista de Tarefas</h1>
            <?php 
                $c = new Tarefa(); 
                $lista_Tarefa = $c->lista();
                foreach($lista_Tarefa as $lst_Tarefa) { ?>
                <tr>
                    <td><?php echo $lst_Tarefa->getNome(); ?></td>
                    <td><?php echo $lst_Tarefa->getDescricao();?></td>
                    <td><?php echo $lst_Tarefa->getPrazo();?></td>
                    <td><?php echo $lst_Tarefa->getPrioridade();?></td>
                    <td>
    <input type="range" min="0" max="100" step="5" value="50" id="range" />

<div class="progress-bar" ></div>
</td>
                    <td>
                        <a href="TarefaAltera.php?editar=<?php echo $lst_Tarefa->getNome();?>" class="edit_btn">Alterar</a>
                    </td>
                    <td>
                        <a href="TarefaExclui.php?excluir=<?php echo $lst_Tarefa->getNome();?>" 
                           class="del_btn">Remover</a>
                    </td>
                </tr>
    

  
  <script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "xe5an78y"
      }], "*")
    }

    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
  </script>

            <?php } ?>
            <tfoot>
                <td colspan="4" align="center">
                    <br> <button class="btn" name="listar" type="button" onclick="location.href='TarefaCadastra.php';">Cadastrar Tarefa</button>
                </td>
            </tfoot>
        </table>
        <?php
            if (isset($_GET['exclusao'])) {
                if ($_GET['exclusao'] == 0){
                    $msg  = "<p name = 'msg' id='msg' class = 'msg_erro'>";
                    $msg .= "Exclusão não pôde ser realizada.</p>";                  
                    echo $msg;
                }
            }
        ?>   
        </div>
    </body>
</html>
