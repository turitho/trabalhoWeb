<?php

function getMedicos() {
    $conexao = getConnection();

    $sql = "SELECT * FROM medico ORDER BY id_medico DESC";

    $sentenca = $conexao->query($sql);

    $dados = $sentenca->fetchAll(PDO::FETCH_ASSOC);

    return $dados;
}

function getConnection() {
    $host = 'localhost';
    $port = '5432';
    $dbname = 'hospital';
    $user = 'postgres';
    $password = 'postgres';

    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        $conn = new PDO($dsn, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
        return null;
    }
}

function insertMedico($dados) {
    $conexao = getConnection();

    $nome = $dados['nome'];
    $crm = $dados['crm'];
    $especialidade = $dados['especialidade'];

    $sql = "INSERT INTO medico (nome, crm, especialidade) VALUES (:nome, :crm, :especialidade)";

    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(':nome', $nome);
    $sentenca->bindParam(':crm', $crm);
    $sentenca->bindParam(':especialidade', $especialidade);

    $sentenca->execute();
}

function getMedicoById($id_medico) {
    $conexao = getConnection();

    $sql = "SELECT * FROM medico WHERE id_medico=:id_medico";

    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(':id_medico', $id_medico);

    $sentenca->execute();

    $dados = $sentenca->fetch(PDO::FETCH_ASSOC);

    return $dados;
}

function updateMedico($dados) {
    $conexao = getConnection();

    $id_medico = $dados['id_medico'];
    $nome = $dados['nome'];
    $crm = $dados['crm'];
    $especialidade = $dados['especialidade'];

    $sql = "UPDATE medico SET nome=:nome, crm=:crm, especialidade=:especialidade WHERE id_medico=:id_medico";

    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(':id_medico', $id_medico);
    $sentenca->bindParam(':nome', $nome);
    $sentenca->bindParam(':crm', $crm);
    $sentenca->bindParam(':especialidade', $especialidade);

    $sentenca->execute();
}

function deleteMedico($id_medico) {
    $conexao = getConnection();

    $sql = "DELETE FROM medico WHERE id_medico=:id_medico";

    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(':id_medico', $id_medico);

    $sentenca->execute();
}

?>