<?php
require_once("funcao.php");
$conn = conectarBD();

$id = $_GET['id'];

$query = "DELETE FROM Prontuario WHERE ID_Prontuario = :id";
$stmt = $conn->prepare($query);
$sucesso = $stmt->execute([':id' => $id]);

if ($sucesso) {
    header("Location: prontuarios.php");
} else {
    echo "Erro ao excluir o prontuário.";
}
?>