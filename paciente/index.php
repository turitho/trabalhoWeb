<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "funcao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pacientes</title>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Sistema de Pacientes</h1>

    <div class="menu">

        <div class="opcao">
            <h2>Criar Paciente</h2>
            <a href="formulario_pacientes.php">
                Cadastrar
            </a>
        </div>

        <div class="opcao">
            <h2>Listar Pacientes</h2>
            <a href="pacientes.php">
                Listar
            </a>
        </div>

        <div class="opcao">
            <h2>Editar Paciente</h2>
            <a href="editar_paciente.php">
                Editar
            </a>
        </div>

        <div class="opcao">
            <h2>Excluir Paciente</h2>
            <a href="excluir_paciente.php">
                Excluir
            </a>
        </div>

    </div>

</body>

</html>