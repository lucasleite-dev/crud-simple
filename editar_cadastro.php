<?php
require_once('libs/Usuario.php');
$usuario = new Usuario();
$id = $_GET['id'];
$usuario->loadById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="pagina">
        <div class="titulo">
            <h1>Editar Usuário</h3>
        </div>
        <div class="conteudo">
            <form class="form-cadastro" action="validar_cadastro.php" method="post">
                <fieldset class="form-group">
                    <label for="inp-nome">Nome</label>
                    <input type="text" name="inp-nome" id="inp-nome" value="<?php echo $usuario->getNome(); ?>">
                    <label for="inp-idade">Idade</label>
                    <input type="number" name="inp-idade" id="inp-idade" value="<?php echo $usuario->getIdade(); ?>">
                    <label for="inp-plano">Plano</label>
                    <input type="text" name="inp-plano" id="inp-plano" value="<?php echo $usuario->getPlano(); ?>">
                    <label for="inp-cpf">CPF</label>
                    <input type="text" name="inp-cpf" id="inp-cpf" value="<?php echo $usuario->getCpf(); ?>">
                    <label for="inp-telefone">Telefone</label>
                    <input type="text" name="inp-nome" id="inp-telefone" value="<?php echo $usuario->getTelefone(); ?>">
                    <label for="inp-telefone2">Telefone 2</label>
                    <input type="text" name="inp-nome" id="inp-telefone2" value="<?php echo $usuario->getTelefone2(); ?>">
                    <label for="inp-qntd-dependentes">Quantidade de Dependentes</label>
                    <input type="text" name="inp-qntd-dependentes" id="inp-qntd-dependentes" value="<?php echo $usuario->getDependentes(); ?>">
                    <label for="inp-mensalidade">Mensalidade</label>
                    <input type="text" name="inp-mensalidade" id="inp-mensalidade" value="<?php echo $usuario->getMensalidade(); ?>">
                    <label for="inp-apartamento">Apartamento</label>
                    <input type="text" name="inp-apartamento" id="inp-apartamento"  value="<?php echo $usuario->getApartamento(); ?>">
                    <button id="btn-cadastrar" type="submit">Salvar</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>