<?php

require_once 'Database.php';

abstract class Crud {

    protected $table;

    abstract public function insert();
    abstract public function update();

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

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE idusuario = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}