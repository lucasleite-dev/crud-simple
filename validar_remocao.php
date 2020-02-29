<?php

if (!isset($_GET['id'])) return header('Location: index.php');

require_once('classes/usuario.php');

$usuario = new Usuario();
$id = $_GET['id'];
$usuario->loadById($id);

if ($usuario->getNome() == null) return header('Location: index.php');

$usuario->delete();

header('Location: index.php');

?>