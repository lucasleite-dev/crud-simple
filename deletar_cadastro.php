<?php
if (!isset($_GET['id'])) return header('Location: index.php');

require_once('classes/database.php');
require_once('classes/usuario.php');
$db = new DB();
$usuario = new Usuario();
$id = $_GET['id'];
$usuario->loadById($id);

if ($usuario->getNome() == null) return header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Deletar Usuário</title>
</head>
<body>
    <div class="pagina">
        <div class="titulo">
            <h1 style="font-size:36px">Tem certeza que deseja deletar o Usuário <?php echo $usuario->getNome();?>?</h3>
        </div>
        <div class="conteudo-deletar">
            <a id="btn-deletar" href="validar_remocao.php?id=<?php echo $usuario->getIdUsuario();?>">Sim</a>
            <a id="btn-deletar" href="index.php">Não</a>
        </div>
    </div>
</body>
</html>