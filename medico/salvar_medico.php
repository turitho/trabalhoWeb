<?php

$dados = array();
$dados['id_medico'] = $_POST['id_medico'];
$dados['nome'] = $_POST['nome'];
$dados['crm'] = $_POST['crm'];
$dados['especialidade'] = $_POST['especialidade'];

include "funcao.php";

if ($dados['id_medico'] == 0 || $dados['id_medico'] == '') {
    insertMedico($dados);
} else {
    updateMedico($dados);
}

header('location: medicos.php');

?>