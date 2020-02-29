<?php

class DB extends PDO{

    private $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=localhost;dbname=planodesaude;charset=utf8", "root", "root");

    }

    private function setParam($stmt, $key, $value = array()){
        $stmt->bindParam($key, $value);
    }
    
    private function setParams($stmt, $params = array()){
        foreach ($params as $key => $value){
            $this->setParam($stmt, $key, $value);
        }
    }

    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array()):array {

        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert($params = array()){

        $query = "INSERT INTO usuario (nome, idade, plano, cpf, telefone, telefone2, dependentes, mensalidade, apartamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        foreach ($params as $key => $value) {

            $stmt->bindValue($key, $value);

        }

        $stmt->execute();

    }

    public function delete($id){
        $result = $this->select("SELECT * FROM usuario WHERE idusuario = :ID", array(
            ":ID" => $id
        ));
        if(count($result) > 0){
            $query = "DELETE FROM usuario WHERE idusuario = :ID; SET @count = 0; UPDATE `usuario` SET `usuario`.`idusuario` = @count:= @count + 1;";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':ID', $id);
            $stmt->execute();
        }
    }
}