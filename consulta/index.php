<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consultas</title>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Sistema de Consultas</h1>

    <div class="menu">

        <div class="opcao">
            <h2>Nova Consulta</h2>
            <a href="formulario_consulta.php">
                Cadastrar
            </a>
        </div>

        <div class="opcao">
            <h2>Listar Consultas</h2>
            <a href="consultas.php">
                Listar
            </a>
        </div>

    </div>

</body>

</html>
