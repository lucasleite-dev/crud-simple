<?php

if (!isset($_GET['id'])) return header('Location: index.php');

require_once('./classes/Usuario.php');
$usuario = new Usuario();
$id = $_GET['id'];
$result = $usuario->find($id);
$usuario->delete($id);

header('Location: index.php');

?>