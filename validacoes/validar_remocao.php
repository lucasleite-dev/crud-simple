<?php

if (!isset($_GET['id']) || $_GET['id'] == null) return header('Location: ../index.php');

require_once(__DIR__.'/../models/Usuario.php');
$usuario = new Usuario();
$id = $_GET['id'];
$result = $usuario->find($id);
$usuario->delete($id);

header('Location: ../index.php');

?>