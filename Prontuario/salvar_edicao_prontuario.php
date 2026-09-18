<?php
require_once("funcao.php");
$conn = conectarBD();

$id_prontuario = $_POST['id_prontuario'];
$observacoes = $_POST['observacoes'];
$receituario = $_POST['receituario'];

$query = "UPDATE Prontuario SET Observacoes = :observacoes, Receituario = :receituario WHERE ID_Prontuario = :id";
$stmt = $conn->prepare($query);

$sucesso = $stmt->execute([
    ':observacoes' => $observacoes,
    ':receituario' => $receituario,
    ':id' => $id_prontuario
]);

if ($sucesso) {
    header("Location: prontuarios.php");
} else {
    echo "Erro ao atualizar o prontuário.";
}
?>