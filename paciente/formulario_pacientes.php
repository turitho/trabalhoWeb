<?php

include "status_paciente.php";

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Novo Paciente</title>

<link rel="stylesheet" href="estilo1.css">

</head>

<body>

<h1>Formulário de Paciente</h1>

<form action="salvar_paciente.php" method="post">

    <div>

        <label>Nome</label>

        <input type="text" id="nome" name="nome">

    </div>

    <div>

        <label>CPF</label>

        <input type="text" id="cpf" name="cpf">

    </div>

    <div>

        <label>Telefone</label>

        <input type="text" id="telefone" name="telefone">

    </div>

    <div>

        <label>Data de Nascimento</label>

        <input type="date" id="data_nascimento" name="data_nascimento">

    </div>

    <div>

        <label>Status</label>

        <select id="status" name="status">

            <option value="<?= StatusPaciente::MODERADO->value ?>">
                Moderado
            </option>

            <option value="<?= StatusPaciente::LEVE->value ?>">
                Leve
            </option>

            <option value="<?= StatusPaciente::GRAVE->value ?>">
                Grave
            </option>

        </select>

    </div>

    <div class="centro">

        <button type="submit">Salvar</button>

    </div>

</form>

</body>

</html>
