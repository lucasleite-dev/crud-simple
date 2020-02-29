<?php
require_once('classes/database.php');
$db = new DB();
$usuarios = $db->select("select * from usuario");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Plano de Saúde</title>
</head>
<body>
    <div class="pagina">
        <div class="titulo">
            <h1>Usuários com Planos de Saúde</h3>
        </div>
        <div class="conteudo">
            <a id="btn-fazer-cadastro" href="cadastrar.php">Cadastrar</a>
            <table class="tabela-lista-clientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Plano</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Telefone<br>Opcional</th>
                        <th>Quantidade<br>de<br>Dependentes</th>
                        <th>Apartamento</th>
                        <th>Mensalidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario){ ?>
                        <tr>
                            <td><?php echo $usuario['idusuario']; ?></td>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><?php echo $usuario['idade']; ?></td>
                            <td><?php echo $usuario['plano']; ?></td>
                            <td><?php echo $usuario['cpf']; ?></td>
                            <td><?php echo $usuario['telefone']; ?></td>
                            <td><?php echo $usuario['telefone2']; ?></td>
                            <td><?php echo $usuario['dependentes']; ?></td>
                            <td><?php if ($usuario['apartamento'] == "nao") {echo  "Não";} else {echo "Sim";} ?></td>
                            <td>R$ <?php echo $usuario['mensalidade']; ?></td>
                            <td>
                                <a id="btn-edit" href="editar_cadastro.php?id=<?php echo $usuario['idusuario']; ?>">Editar</a>
                                <a id="btn-del" href="deletar_cadastro.php?id=<?php echo $usuario['idusuario']; ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>