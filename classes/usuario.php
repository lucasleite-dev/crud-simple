<?php
require_once './libs/Crud.php';

class Usuario extends Crud {

    protected $table = "usuario";

    private $idusuario;
    private $nome;
    private $idade;
    private $plano;
    private $cpf;
    private $telefone;
    private $telefone2;
    private $dependentes;
    private $mensalidade;
    private $apartamento;

    public function getIdUsuario(){
        return $this->idusuario;
    }

    public function setIdUsuario($value){
        $this->idusuario = $value;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($value){
        $this->idade = $value;
    }

    public function getPlano(){
        return $this->plano;
    }

    public function setPlano($value){
        $this->plano = $value;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($value){
        $this->cpf = $value;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($value){
        $this->telefone = $value;
    }

    public function getTelefone2(){
        return $this->telefone2;
    }

    public function setTelefone2($value = null){
        $this->telefone2 = $value;
    }

    public function getDependentes(){
        return $this->dependentes;
    }

    public function setDependentes($value){
        $this->dependentes = $value;
    }

    public function getMensalidade(){
        return $this->mensalidade;
    }

    public function setMensalidade($value){
        $this->mensalidade = $value;
    }

    public function getApartamento(){
        return $this->apartamento;
    }

    public function setApartamento($value){
        $this->apartamento = $value;
    }

    public function loadById($id){
        $row = find($id);
        $this->idusuario = $row->idusuario;
        $this->nome = $row->nome;
        $this->idade = $row->idade;
        $this->plano = $row->plano;
        $this->cpf = $row->cpf;
        $this->telefone = $row->telefone;
        $this->telefone2 = $row->telefone2;
        $this->dependentes = $row->dependentes;
        $this->mensalidade = $row->mensalidade;
        $this->apartamento = $row->apartamento;
    }

    public function insert(){
        $sql = "INSERT INTO $this->table (nome, idade, plano, cpf, telefone, telefone2, dependentes, mensalidade, apartamento) VALUES (:nome, :idade, :plano, :cpf, :telefone, :telefone2, :dependentes, :mensalidade, :apartamento); SET @count = 0; UPDATE $this->table SET $this->table.idusuario = @count:= @count + 1;";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':plano', $this->plano);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':telefone2', $this->telefone2);
        $stmt->bindParam(':dependentes', $this->dependentes);
        $stmt->bindParam(':mensalidade', $this->mensalidade);
        $stmt->bindParam(':apartamento', $this->apartamento);
        return $stmt->execute();
    }

    public function update(){
        $sql = "UPDATE $this->table SET nome = :nome, idade = :idade, plano = :plano, cpf = :cpf, telefone = :telefone, telefone2 = :telefone2, dependentes = :dependentes, mensalidade = :mensalidade, apartamento = :apartamento WHERE idusuario = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->idusuario);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':plano', $this->plano);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':telefone2', $this->telefone2);
        $stmt->bindParam(':dependentes', $this->dependentes);
        $stmt->bindParam(':mensalidade', $this->mensalidade);
        $stmt->bindParam(':apartamento', $this->apartamento);
        return $stmt->execute();
    }
}