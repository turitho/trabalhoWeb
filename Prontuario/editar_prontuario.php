<?php
require_once("funcao.php");
$conn = conectarBD();

$id = $_GET['id'];
$query = "SELECT * FROM Prontuario WHERE ID_Prontuario = :id";
$stmt = $conn->prepare($query);
$stmt->execute([':id' => $id]);
$prontuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Prontuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h2 class="centro">Editar Prontuário</h2>

    <div class="formulario">
        <form action="salvar_edicao_prontuario.php" method="POST">
            <input type="hidden" name="id_prontuario" value="<?= $prontuario['id_prontuario'] ?>">

            <label>Observações:</label>
            <textarea name="observacoes" rows="4"><?= htmlspecialchars($prontuario['observacoes']) ?></textarea>

            <label>Receituário:</label>
            <textarea name="receituario" rows="4"><?= htmlspecialchars($prontuario['receituario']) ?></textarea>

            <div class="centro">
                <button type="submit">Atualizar</button>
                <a href="prontuarios.php">Cancelar</a>
            </div>
        </form>
    </div>

</body>
</html>