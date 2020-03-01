<?php

require_once(__DIR__ . "/../database/Database.php");

abstract class Model {

    protected $table;

    abstract public function insert();
    abstract public function update();
    abstract public function find($id);
    abstract public function findAll();
    abstract public function delete($id);

}