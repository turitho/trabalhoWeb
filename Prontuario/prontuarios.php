<?php
require_once("funcao.php");
$conn = conectarBD();

$query = "SELECT p.ID_Prontuario, p.Observacoes, p.Receituario, c.ID_Consulta, c.Data_Hora 
          FROM Prontuario p 
          JOIN Consulta c ON p.ID_Consulta = c.ID_Consulta 
          ORDER BY p.ID_Prontuario DESC";

$stmt = $conn->query($query);
$prontuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Prontuários</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <h2 class="centro">Lista de Prontuários</h2>

    <div class="centro">
        <a href="formulario_prontuario.php">Novo Prontuário</a>
    </div>

    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Consulta (Data)</th>
                <th>Observações</th>
                <th>Receituário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prontuarios as $linha): ?>
            <tr>
                <td><?= $linha['id_prontuario'] ?></td>
                <td>Consulta #<?= $linha['id_consulta'] ?> (<?= date('d/m/Y H:i', strtotime($linha['data_hora'])) ?>)</td>
                <td><?= htmlspecialchars($linha['observacoes']) ?></td>
                <td><?= htmlspecialchars($linha['receituario']) ?></td>
                <td>
                    <a href="editar_prontuario.php?id=<?= $linha['id_prontuario'] ?>">Editar</a> | 
                    <a href="excluir_prontuario.php?id=<?= $linha['id_prontuario'] ?>" onclick="return confirm('Confirmar exclusão?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>