<?php

include_once('ConexaoBD.php');
class Tarefa {
private $nome;
private $descricao;
private $prazo;
private $prioridade;
private $concluido;
private $progresso;

function getProgresso() {
    return $this->progresso;
}

function setProgresso($progresso) {
    $this->progresso = $progresso;
}


function getConcluido() {
    return $this->concluido;
}

function setConcluido($concluido) {
    $this->concluido = $concluido;
}


function getNome() {
    return $this->nome;
}

function getDescricao() {
    return $this->descricao;
}

function getPrazo() {
    return $this->prazo;
}

function getPrioridade() {
    return $this->prioridade;
}

function setNome($nome) {
    $this->nome = $nome;
}

function setDescricao($descricao) {
    $this->descricao = $descricao;
}

function setPrazo($prazo) {
    $this->prazo = $prazo;
}

function setPrioridade($prioridade) {
    $this->prioridade = $prioridade;
}

function __construct($nome = null, $descricao = null, $prazo = null, $prioridade = null, $concluido = null, $progresso = null) {
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->prazo = $prazo;
    $this->prioridade = $prioridade;
    $this->concluido = $concluido;
    $this->progresso = $progresso;
}

    public function lista(){
        try {
            $sql  = "SELECT Nome, Descricao, Prazo, Prioridade, Concluido, Progresso FROM Tarefa ORDER BY Nome";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Tarefa = new Tarefa();                
                $Tarefa->setNome($row->Nome);
                $Tarefa->setDescricao($row->Descricao);
                $Tarefa->setPrazo($row->Prazo);
                $Tarefa->setPrioridade($row->Prioridade);
                  $Tarefa->setConcluido($row->Concluido);
                  $Tarefa->setProgresso($row->Progresso);
                $res[] = $Tarefa;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($nome){
        try {
            $sql  = "SELECT IdTarefa, Nome FROM TbTarefa WHERE Nome = ".$nome." ORDER BY Nome";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Tarefa = new Tarefa();                
                $Tarefa->setNome($row->Nome);
                
                
                $res[] = $Tarefa;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $descricao, $prazo, $prioridade, $concluido, $progresso){
        try {
            $sql = "UPDATE Tarefa
                       SET Nome = ?
                       SET DESCRICAO =?
                       SET PRAZO =?
                       SET PRIORIDADE =?
                       SET CONCLUIDO=?
                       SET PROGRESSO =?
                     WHERE Nome = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $descricao);
             $stm->bindParam(3, $prazo);
              $stm->bindParam(4, $prioridade);
              $stm->bindParam(5, $concluido);
              $stm->bindParam(6, $progresso);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($nome, $descricao, $prazo, $prioridade, $concluido, $progresso){
      try {
        $sql = "INSERT INTO Tarefa(nome, descricao, prazo, prioridade, concluido, progresso)
                VALUES (?, ?,?,?,?,?)";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $nome);
        $stm->bindParam(2, $descricao); 
        $stm->bindParam(3, $prazo); 
        $stm->bindParam(4, $prioridade); 
         $stm->bindParam(5, $concluido); 
         $stm->bindParam(6, $progresso);
	$stm->execute();
        return 1;
      } catch (Exception $e) {
        return 0; 
      }     
    } //método insere
    
    public function exclui($nome){
      try {
	      $sql = "DELETE FROM Tarefa WHERE Nome = ?"; 
	      $conn = ConexaoBD::conecta();
                                       
	      $stm = $conn->prepare($sql);
	      $stm->bindParam(1, $nome);
	      $stm->execute();
              return 1; 
	    } catch (Exception $e) {
              return 0; 
      } //try-catch     
    } //método exclui

}