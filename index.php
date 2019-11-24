<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas:</title>
    </head>
    <body>
        <h1>Gerenciador de Tarefas</h1>
        <form action="index.php">
            <fieldset>
                <legend>Nova tarefa</legend>
                <label>
                    Tarefa:
                    <input type="text" name="nome" />
                    <br />
                    <br />
                </label>
                <label>
                    Descrição (Opcional):
                    <textarea name="descricao"></textarea>
                    <br />
                    <br />
                </label>
                <label>
                    Prazo (Opcional):
                    <input type="text" name="prazo" />
                    <br />
                    <br />
                </label>
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
                <label>
                    Tarefa concluída:
                    <input type="checkbox" name="concluida" value="sim" />
                    <br />
                    <br />
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </form>
        <table>
            <tr>
                <th>Tarefa</th>
                <th>Descricao</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
            </tr>
          <?php
  

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $tarefa = array();
    $tarefa['nome'] = $_GET['nome'];
    if (isset($_GET['descricao'])) {
        $tarefa['descricao'] = $_GET['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }
    if (isset($_GET['prazo'])) {
        $tarefa['prazo'] = $_GET['prazo'];
    } else {
        $tarefa['prazo'] = '';
    }
    $tarefa['prioridade'] = $_GET['prioridade'];
    if (isset($_GET['concluida'])) {
        $tarefa['concluida'] = $_GET['concluida'];
    } else {
        $tarefa['concluida'] = '';
    }
    $_SESSION['lista_tarefas'][] = $tarefa;
}
  
  
if (isset($_SESSION['lista_tarefas'])) {
    $lista_tarefas = $_SESSION['lista_tarefas'];
} else {
    $lista_tarefas = array();
}
  
  
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
?>
    </body>
</html>
           
