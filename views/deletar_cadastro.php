<?php
if (!isset($_GET['id']) || $_GET['id'] == null) return header('Location: ../index.php');

require_once(__DIR__ . '/../models/Usuario.php');
$usuario = new Usuario();
$id = $_GET['id'];
$result = $usuario->find($id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Remoção</title>
</head>
<body>
    <div class="pagina">
        <div class="titulo">
            <h1 style="font-size:36px">Tem certeza que deseja deletar o Usuário <?= $result->nome;?>?</h3>
        </div>
        <div class="conteudo-deletar">
            <a id="btn-deletar" href="../validacoes/validar_remocao.php?id=<?= $result->idusuario;?>">Sim</a>
            <a id="btn-deletar" href="../index.php">Não</a>
        </div>
    </div>
</body>
</html>