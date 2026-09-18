<?php

    include "gravidade_consulta.php";
    include "funcao.php";

    $id = $_GET['id'];

    $consulta = getConsultaPorId($id);

    $medicos = getMedicos();
    $pacientes = getPacientes();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Editar Consulta</title>

<link rel="stylesheet" href="estilo1.css">

</head>

<body>

<h1>Editar Consulta</h1>

<form action="atualizar_consulta.php" method="post">

    <input type="hidden" name="id" value="<?= $consulta['ID_Consulta'] ?>">

    <div>

        <label>Data e Hora</label>

        <input type="datetime-local" id="data_hora" name="data_hora"
               value="<?= date('Y-m-d\TH:i', strtotime($consulta['Data_Hora'])) ?>">

    </div>

    <div>

        <label>Paciente</label>

        <select id="id_paciente" name="id_paciente">

            <?php foreach ($pacientes as $paciente): ?>

                <option value="<?= $paciente['ID_Paciente'] ?>"
                    <?= $paciente['ID_Paciente'] == $consulta['ID_Paciente'] ? 'selected' : '' ?>>
                    <?= $paciente['Nome'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div>

        <label>Médico</label>

        <select id="id_medico" name="id_medico">

            <?php foreach ($medicos as $medico): ?>

                <option value="<?= $medico['ID_Medico'] ?>"
                    <?= $medico['ID_Medico'] == $consulta['ID_Medico'] ? 'selected' : '' ?>>
                    <?= $medico['Nome'] ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div>

        <label>Gravidade</label>

        <select id="gravidade" name="gravidade">

            <?php foreach (GravidadeConsulta::cases() as $g): ?>

                <option value="<?= $g->value ?>"
                    <?= $g->value == $consulta['Gravidade'] ? 'selected' : '' ?>>
                    <?= $g->value ?>
                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div>

        <label>Diagnóstico</label>

        <textarea id="diagnostico" name="diagnostico"><?= $consulta['Diagnostico'] ?></textarea>

    </div>

    <div class="centro">

        <button type="submit">Atualizar</button>

    </div>

</form>

</body>

</html>
