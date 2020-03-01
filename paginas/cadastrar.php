<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="pagina">
        <div class="titulo-cadastrar">
            <h1>Cadastrar Usuário</h3>
        </div>
        <div class="conteudo">
            <?php if (isset($_GET['erro'])) {?>
                <div class="msg-erro">
                    <p><?=$_GET['erro']?></p>
                </div>
            <?php } ?>
            <a id="btn-voltar" href="../index.php">Voltar</a>
            <form class="form-cadastro" action="../validacoes/validar_cadastro.php" method="post">
                <fieldset class="form-group">
                    <label for="inp-nome">Nome *</label>
                    <input type="text" name="inp-nome" id="inp-nome" required>
                    <label for="inp-idade">Idade *</label>
                    <input type="number" name="inp-idade" id="inp-idade" min="0" max="150" required>
                    <label for="inp-plano">Plano *</label><br>
                    <select name="inp-plano" style="width:150px;height:40px;" required>
                        <option value="Plano Básico">Plano Básico</option>
                        <option value="Plano Médio">Plano Médio</option>
                        <option value="Plano Master">Plano Master</option>
                    </select><br><br>
                    <label for="inp-cpf">CPF *</label>
                    <input type="text" name="inp-cpf" id="inp-cpf" minlength="11" maxlength="11" required>
                    <label for="inp-telefone">Telefone *</label>
                    <input type="text" name="inp-telefone" id="inp-telefone" minlength="10" maxlength="11" required>
                    <label for="inp-telefone2">Telefone (Opcional)</label>
                    <input type="text" name="inp-telefone2" id="inp-telefone2" minlength="10" maxlength="11">
                    <label for="inp-qntd-dependentes">Quantidade de Dependentes *</label>
                    <input type="text" name="inp-qntd-dependentes" id="inp-qntd-dependentes" min="0" required>
                    <label for="inp-apartamento">Apartamento *</label><br>
                    <select name="inp-apartamento" style="width:150px;height:40px;" required>
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                    </select><br><br>
                    <button id="btn-cadastrar" type="submit">Cadastrar</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>