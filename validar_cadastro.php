<?php
if (!isset($_POST['inp-nome'])){
    header('Location: index.php');
} elseif (!isset($_POST['inp-idade'])){
    header('Location: index.php');
} elseif (!isset($_POST['inp-plano'])){
    header('Location: index.php');
} elseif (!isset($_POST['inp-cpf'])){
    header('Location: index.php');
} elseif (!isset($_POST['inp-telefone'])){
    header('Location: index.php');
} elseif (!isset($_POST['inp-qntd-dependentes'])){
    header('Location: index.php');
} elseif (!isset($_POST['inp-apartamento'])){
    header('Location: index.php');
}

require_once('./classes/Usuario.php');

$nome = $_POST['inp-nome'];
$idade = $_POST['inp-idade'];
$plano = $_POST['inp-plano'];
$cpf = $_POST['inp-cpf'];
$telefone = $_POST['inp-telefone'];
$telefone2 = $_POST['inp-telefone2'];
$qntd_dependentes = $_POST['inp-qntd-dependentes'];
$apartamento = $_POST['inp-apartamento'];
$valor = 0;

$planos = ['Plano Básico', 'Plano Médio', 'Plano Master'];

if ($plano == $planos[0]){ // Plano Básico
    if ($idade >= 0 and $idade <= 30){
        $valor = 180;
    }elseif ($idade > 30 and $idade <= 50) {
        $valor = 260;
    }elseif ($idade > 50) {
        $valor = 440;
    }

    if ($apartamento == "Sim"){
        $valor += $valor * 0.1;
    }
} elseif ($plano == $planos[1]) { // Plano Médio
    if ($idade >= 0 and $idade <= 30){
        $valor = 200;
    }elseif ($idade > 30 and $idade <= 50) {
        $valor = 320;
    }elseif ($idade > 50) {
        $valor = 550;
    }

    if ($apartamento == "Sim" and $qntd_dependentes > 0){
        $valor += $valor * 0.15;
    } elseif ($apartamento == "Sim" and $qntd_dependentes == 0) {
        $valor += $valor * 0.1;
    }

    if ($qntd_dependentes > 0){
        $valor += 20 * $qntd_dependentes;
    }
} elseif ($plano == $planos[2]) { // Plano Master
    if ($idade >= 0 and $idade <= 30){
        $valor = 250;
    }elseif ($idade > 30 and $idade <= 50) {
        $valor = 350;
    }elseif ($idade > 50) {
        $valor = 600;
    }

    if ($qntd_dependentes > 0){
        $valor += $valor * 0.03;
    }

    if ($apartamento == "Sim"){
        $valor += 50;
    }
}

$usuario = new Usuario();
$usuario->setNome($nome);
$usuario->setIdade($idade);
$usuario->setPlano($plano);
$usuario->setCpf($cpf);
$usuario->setTelefone($telefone);
$usuario->setTelefone2($telefone2);
$usuario->setDependentes($qntd_dependentes);
$usuario->setApartamento($apartamento);
$usuario->setMensalidade($valor);
$usuario->insert();

header('Location: index.php');

?>