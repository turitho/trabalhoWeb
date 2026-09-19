<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Médico</title>
    <link rel="stylesheet" href="estilo1.css">
</head>
<body>
    <h1>Formulário de Médico</h1>

    <form action="salvar_medico.php" method="post">
        <div>
            <label>ID Médico</label>
            <input readonly type="text" id="id_medico" name="id_medico" value="<?php echo $dados['id_medico']; ?>">
        </div>

        <div>
            <label>Nome</label>
            <input type="text" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
        </div>

        <div>
            <label>CRM</label>
            <input type="text" id="crm" name="crm" value="<?php echo $dados['crm']; ?>">
        </div>

        <div>
            <label>Especialidade</label>
            <input type="text" id="especialidade" name="especialidade" value="<?php echo $dados['especialidade']; ?>">
        </div>

        <div class="centro">
            <button type="submit">Salvar</button>
        </div>
    </form>
</body>
</html>