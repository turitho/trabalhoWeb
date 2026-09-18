<?php
  $dados = array();
  $dados['id'] = $_POST['id'];
  $dados['data_hora'] = $_POST['data_hora'];
  $dados['diagnostico'] = $_POST['diagnostico'];
  $dados['id_medico'] = $_POST['id_medico'];
  $dados['id_paciente'] = $_POST['id_paciente'];
  $dados['gravidade'] = $_POST['gravidade'];

  include "funcao.php";

  if ($dados['id'] == 0 || $dados['id'] == '') {
    insertConsulta($dados);
  } else {
    updateConsulta($dados);
  }

  header('location: consultas.php');
?>
