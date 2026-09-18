<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "funcao.php";

    $consultas = getConsultas();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Consultas</title>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <h1>Consultas</h1>

    <div class="centro">
        <a href="formulario_consulta.php">Nova Consulta</a>
        |
        <a href="index.php">Voltar</a>
    </div>

    <table class="tabela">

        <thead>
            <tr>
                <th>ID</th>
                <th>Data/Hora</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Gravidade</th>
                <th>Diagnóstico</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($consultas as $consulta): ?>

                <tr>
                    <td><?= $consulta['ID_Consulta'] ?></td>
                    <td><?= $consulta['Data_Hora'] ?></td>
                    <td><?= $consulta['Nome_Paciente'] ?></td>
                    <td><?= $consulta['Nome_Medico'] ?></td>
                    <td><?= $consulta['Gravidade'] ?></td>
                    <td><?= $consulta['Diagnostico'] ?></td>
                    <td>
                        <a href="editar_consulta.php?id=<?= $consulta['ID_Consulta'] ?>">
                            Editar
                        </a>
                        |
                        <a href="excluir_consulta.php?id=<?= $consulta['ID_Consulta'] ?>"
                           onclick="return confirm('Excluir esta consulta?');">
                            Excluir
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</body>

</html>
