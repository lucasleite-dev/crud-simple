<?php
require_once('./classes/database.php');

class Usuario {

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
        $db = new DB();
        $result = $db->select("SELECT * FROM usuario WHERE idusuario = :ID", array(
            ":ID" => $id
        ));

        if (count($result) > 0){
            $row = $result[0];

            $this->setIdUsuario($row['idusuario']);
            $this->setNome($row['nome']);
            $this->setIdade($row['idade']);
            $this->setPlano($row['plano']);
            $this->setCpf($row['cpf']);
            $this->setTelefone($row['telefone']);
            $this->setTelefone2($row['telefone2']);
            $this->setDependentes($row['dependentes']);
            $this->setMensalidade($row['mensalidade']);
            $this->setApartamento($row['apartamento']);
        }
    }

    public function insert(){
        $db = new DB();
        $db->insert(array(
            1 => $this->getNome(),
            2 => $this->getIdade(),
            3 => $this->getPlano(),
            4 => $this->getCpf(),
            5 => $this->getTelefone(),
            6 => $this->getTelefone2(),
            7 => $this->getDependentes(),
            8 => $this->getMensalidade(),
            9 => $this->getApartamento()
        ));
    }

    public function delete(){
        $db = new DB();
        $db->delete($this->getIdUsuario());
    }

}

/*
$usuario01 = new Usuario();
$usuario01->setNome('Lucas');
$usuario01->setIdade(22);
$usuario01->setPlano('Plano Básico');
$usuario01->setCpf(9999999999);
$usuario01->setTelefone(79999616768);
$usuario01->setTelefone2();
$usuario01->setDependentes(0);
$usuario01->setMensalidade(180);
$usuario01->setApartamento('nao');
$usuario01->insert();
*/
