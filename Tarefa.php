<?php

include_once('ConexaoBD.php');
class Tarefa {
private $nome;
private $descricao;
private $prazo;
private $prioridade;

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

function __construct($nome = null, $descricao = null, $prazo = null, $prioridade = null) {
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->prazo = $prazo;
    $this->prioridade = $prioridade;
}

    public function lista(){
        try {
            $sql  = "SELECT Nome, Descricao, Prazo, Prioridade FROM Tarefa ORDER BY Nome";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);
            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Tarefa = new Tarefa();                
                $Tarefa->setNome($row->Nome);
                $Tarefa->setDescricao($row->Descricao);
                $Tarefa->setPrazo($row->Prazo);
                $Tarefa->setPrioridade($row->Prioridade);
                $res[] = $Tarefa;
            }
            return $res;
        } catch (Exception $e) {
             echo "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function consulta($idTarefa){
        try {
            $sql  = "SELECT IdTarefa, NoTarefa FROM TbTarefa WHERE IdTarefa = ".$idTarefa." ORDER BY NoTarefa";
            $conn = ConexaoBD::conecta();
            $sql  = $conn->query($sql);

            $res = array();  
            while($row = $sql->fetch(PDO::FETCH_OBJ)) {
                $Tarefa = new Tarefa();                
                $Tarefa->setIdTarefa($row->IdTarefa);
                $Tarefa->setNoTarefa($row->NoTarefa);
                
                $res[] = $Tarefa;
            }
            return $res;
        } catch (Exception $e) {
             return "ERRO: ".$e->getMessage()."<br><br>";
        }     
    }
    
    public function altera($nome, $descricao, $prazo, $prioridade){
        try {
            $sql = "UPDATE Tarefa
                       SET Nome = ? 
                     WHERE Nome = ?"; 
            $conn = ConexaoBD::conecta();

            $stm = $conn->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $descricao);
             $stm->bindParam(3, $prazo);
              $stm->bindParam(4, $prioridade);
            $stm->execute();
            return 1; 
	} catch (Exception $e) {
            return 0; 
        } //try-catch     
    } //método altera
    
    public function insere($nome, $descricao, $prazo, $prioridade){
      try {
        $sql = "INSERT INTO Tarefa(nome, descricao, prazo, prioridade)
                VALUES (?, ?,?,?)";
        $conn = ConexaoBD::conecta();

        $stm  = $conn->prepare($sql);              
        $stm->bindParam(1, $nome);
        $stm->bindParam(2, $descricao); 
        $stm->bindParam(3, $prazo); 
        $stm->bindParam(4, $prioridade); 
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