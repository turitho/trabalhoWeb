<?php

include "gravidade_consulta.php";
include "funcao.php";

$medicos = getMedicos();
$pacientes = getPacientes();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Nova Consulta</title>

<link rel="stylesheet" href="estilo1.css">

</head>

<body>

<h1>Formulário de Consulta</h1>

<form action="salvar_consulta.php" method="post">

    <div>

        <label>Data e Hora</label>

        <input type="datetime-local" id="data_hora" name="data_hora">

    </div>

    <div>

        <label>Paciente</label>

        <select id="id_paciente" name="id_paciente">

            <?php foreach ($pacientes as $paciente): ?>

                <option value="<?= $paciente['ID_Paciente'] ?>">
                    <?= $paciente['Nome'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div>

        <label>Médico</label>

        <select id="id_medico" name="id_medico">

            <?php foreach ($medicos as $medico): ?>

                <option value="<?= $medico['ID_Medico'] ?>">
                    <?= $medico['Nome'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div>

        <label>Gravidade</label>

        <select id="gravidade" name="gravidade">

            <option value="<?= GravidadeConsulta::BAIXA->value ?>">
                Baixa
            </option>

            <option value="<?= GravidadeConsulta::MEDIA->value ?>">
                Média
            </option>

            <option value="<?= GravidadeConsulta::ALTA->value ?>">
                Alta
            </option>

            <option value="<?= GravidadeConsulta::URGENTE->value ?>">
                Urgente
            </option>

        </select>

    </div>

    <div>

        <label>Diagnóstico</label>

        <textarea id="diagnostico" name="diagnostico"></textarea>

    </div>

    <div class="centro">

        <button type="submit">Salvar</button>

    </div>

</form>

</body>

</html>
