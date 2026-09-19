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
    <title>Médicos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Lista de Médicos</h1>

    <a href="formulario_medico.php">Novo Médico</a>

    <?php
    $medicos = getMedicos();

    foreach ($medicos as $medico) {
        $id_medico = $medico['id_medico'];
        $nome = $medico['nome'];
        $crm = $medico['crm'];
        $especialidade = $medico['especialidade'];

        echo "
        <div class='medico'>
            <h2>$id_medico - $nome</h2>
            <p>CRM: $crm</p>
            <p>Especialidade: $especialidade</p>
            <p><a href='editar_medico.php?id_medico=$id_medico'>Editar</a></p>
            <p><a href='excluir_medico.php?id_medico=$id_medico'>Excluir</a></p>
        </div>
        ";
    }
    ?>
</body>
</html>