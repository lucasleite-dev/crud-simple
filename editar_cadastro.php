<?php
require_once('./classes/Usuario.php');
$usuario = new Usuario();
$id = $_GET['id'];
$result = $usuario->find($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edição</title>
</head>
<body>
    <div class="pagina">
        <div class="titulo">
            <h1>Editar Usuário</h3>
        </div>
        <div class="conteudo">
            <form class="form-cadastro" action="validar_edicao.php?id=<?=$result->idusuario?>" method="post">
                <fieldset class="form-group">
                    <label for="inp-nome">Nome *</label>
                    <input type="text" name="inp-nome" id="inp-nome" required value="<?= $result->nome ?>">
                    <label for="inp-idade">Idade *</label>
                    <input type="number" name="inp-idade" id="inp-idade" min="0" max="150" required value="<?= $result->idade ?>">
                    <label for="inp-plano">Plano *</label><br>
                    <select name="inp-plano" style="width:150px;height:40px;" required value="<?= $result->plano ?>">
                        <?php if ($result->plano == "Plano Básico"){ ?>
                            <option value="Plano Básico" selected>Plano Básico</option>
                            <option value="Plano Médio">Plano Médio</option>
                            <option value="Plano Master">Plano Master</option>
                        <?php }elseif ($result->plano == "Plano Médio"){ ?>
                            <option value="Plano Básico">Plano Básico</option>
                            <option value="Plano Médio" selected>Plano Médio</option>
                            <option value="Plano Master">Plano Master</option>
                        <?php }else{ ?>
                            <option value="Plano Básico">Plano Básico</option>
                            <option value="Plano Médio">Plano Médio</option>
                            <option value="Plano Master" selected>Plano Master</option>
                        <?php } ?>
                    </select><br><br>
                    <label for="inp-cpf">CPF *</label>
                    <input type="number" name="inp-cpf" id="inp-cpf" min="11" max="11" required value="<?= $result->cpf ?>">
                    <label for="inp-telefone">Telefone *</label>
                    <input type="number" name="inp-telefone" id="inp-telefone" min="10" max="11" required value="<?= $result->telefone ?>">
                    <label for="inp-telefone2">Telefone (Opcional)</label>
                    <input type="number" name="inp-telefone2" id="inp-telefone2" min="10" max="11" value="<?= $result->telefone2 ?>">
                    <label for="inp-qntd-dependentes">Quantidade de Dependentes *</label>
                    <input type="text" name="inp-qntd-dependentes" id="inp-qntd-dependentes" required value="<?= $result->dependentes ?>">
                    <label for="inp-apartamento">Apartamento *</label><br>
                    <select name="inp-apartamento" style="width:150px;height:40px;" required>
                        <?php if ($result->apartamento == "Sim") { ?>
                            <option value="Sim" selected>Sim</option>
                            <option value="Não">Não</option>
                        <?php }else{ ?>
                            <option value="Sim">Sim</option>
                            <option value="Não" selected>Não</option>
                        <?php } ?>
                    </select><br><br>
                    <button id="btn-cadastrar" type="submit">Salvar</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>