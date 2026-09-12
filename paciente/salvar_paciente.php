<?php

    $dados = array();

    $dados['nome'] = $_POST['nome'];

    $dados['cpf'] = $_POST['cpf'];

    $dados['telefone'] = $_POST['telefone'];

    $dados['data_nascimento'] = $_POST['data_nascimento'];

    $dados['status'] = $_POST['status'];

    include "funcao.php";

    insertPaciente($dados);

    header('location: pacientes.php');

?>