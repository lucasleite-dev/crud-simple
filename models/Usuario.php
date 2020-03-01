<?php
require_once __DIR__. '/Model.php';

class Usuario extends Model {

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

    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE idusuario = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            return $stmt->fetch();
        }
        header('Location: index.php');
    }

    public function findAll(){
        $sql = "SELECT * FROM $this->table ORDER BY idusuario DESC";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert(){
        $sql = "INSERT INTO $this->table (nome, idade, plano, cpf, telefone, telefone2, dependentes, mensalidade, apartamento) VALUES (:nome, :idade, :plano, :cpf, :telefone, :telefone2, :dependentes, :mensalidade, :apartamento)";
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
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':plano', $this->plano);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':telefone2', $this->telefone2);
        $stmt->bindParam(':dependentes', $this->dependentes);
        $stmt->bindParam(':mensalidade', $this->mensalidade);
        $stmt->bindParam(':apartamento', $this->apartamento);
        $stmt->bindParam(':id', $this->idusuario);
        return $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE idusuario = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}