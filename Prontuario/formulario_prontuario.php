<?php
require_once("funcao.php");
$conn = conectarBD();

$stmt = $conn->query("SELECT ID_Consulta, Data_Hora FROM Consulta ORDER BY Data_Hora DESC");
$consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registar Prontuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h2 class="centro">Registar Prontuário</h2>

    <div class="formulario">
        <form action="salvar_prontuario.php" method="POST">
            <label>Consulta:</label>
            <select name="id_consulta" required>
                <option value="">Selecione uma consulta</option>
                <?php foreach ($consultas as $c): ?>
                    <option value="<?= $c['id_consulta'] ?>">Consulta #<?= $c['id_consulta'] ?> - <?= $c['data_hora'] ?></option>
                <?php endforeach; ?>
            </select>

            <label>Observações:</label>
            <textarea name="observacoes" rows="4"></textarea>

            <label>Receituário:</label>
            <textarea name="receituario" rows="4"></textarea>

            <div class="centro">
                <button type="submit">Salvar</button>
                <a href="prontuarios.php">Voltar</a>
            </div>
        </form>
    </div>

</body>
</html>