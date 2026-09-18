<?php
require_once("funcao.php");
$conn = conectarBD();

$id_consulta = $_POST['id_consulta'];
$observacoes = $_POST['observacoes'];
$receituario = $_POST['receituario'];

$query = "INSERT INTO Prontuario (Observacoes, Receituario, ID_Consulta) VALUES (:observacoes, :receituario, :id_consulta)";
$stmt = $conn->prepare($query);

$sucesso = $stmt->execute([
    ':observacoes' => $observacoes,
    ':receituario' => $receituario,
    ':id_consulta' => $id_consulta
]);

if ($sucesso) {
    header("Location: prontuarios.php");
} else {
    echo "Erro ao salvar prontuário.";
}
?>