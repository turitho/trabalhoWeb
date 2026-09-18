<?php
function conectarBD() {
    $host = "localhost";
    $port = "5432";
    $dbname = "clinica_medica";
    $user = "postgres";
    $password = "senha";

    try {
        // Conexão via PDO
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erro ao conectar à base de dados: " . $e->getMessage());
    }
}
?>