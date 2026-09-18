<?php

    $id = $_POST['id'];

    $dados = array();

    $dados['data_hora'] = $_POST['data_hora'];

    $dados['diagnostico'] = $_POST['diagnostico'];

    $dados['id_medico'] = $_POST['id_medico'];

    $dados['id_paciente'] = $_POST['id_paciente'];

    $dados['gravidade'] = $_POST['gravidade'];

    include "funcao.php";

    updateConsulta($id, $dados);

    header('location: consultas.php');

?>
