<?php

    function getPacientes() {

        $conexao = getConnection();

        $sql = "SELECT * FROM paciente ORDER BY \"ID_Paciente\" DESC";

        $sentenca = $conexao->query($sql);

        $dados = $sentenca->fetchAll(PDO::FETCH_ASSOC);

        return $dados;

    }



    function getConnection() {

        $host = 'localhost';

        $port = '5432';

        $dbname = 'hospital';

        $user = 'postgres';

        $password = 'postgresql';

        try {

            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

            $conn = new PDO($dsn, $user, $password);

            $conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $conn;

        } catch (PDOException $e) {

            echo "Erro na conexão: " . $e->getMessage();

            return null;

        }

    }



    function insertPaciente($dados) {

        $conexao = getConnection();

        $nome = $dados['nome'];

        $cpf = $dados['cpf'];

        $telefone = $dados['telefone'];

        $data_nascimento = $dados['data_nascimento'];

        $status = $dados['status'];

        $sql = "INSERT INTO paciente 
                (\"Nome\", \"CPF\", \"Telefone\", \"Data_Nascimento\", \"Status\")
                VALUES (:nome, :cpf, :telefone, :data_nascimento, :status)";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindParam(':nome', $nome);

        $sentenca->bindParam(':cpf', $cpf);

        $sentenca->bindParam(':telefone', $telefone);

        $sentenca->bindParam(':data_nascimento', $data_nascimento);

        $sentenca->bindParam(':status', $status);

        $sentenca->execute();

    }

   function deletePaciente($id) {

    $conexao = getConnection();

    $sql = "DELETE FROM paciente WHERE \"ID_Paciente\" = :id";

    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(':id', $id);

    $sentenca->execute();

}

    function updatePaciente($id, $dados){

    $conexao = getConnection();

    $nome = $dados['nome'];
    $cpf = $dados['cpf'];
    $telefone = $dados['telefone'];
    $data_nascimento = $dados['data_nascimento'];
    $status = $dados['status'];

    $sql = "UPDATE paciente SET
            \"Nome\" = :nome,
            \"CPF\" = :cpf,
            \"Telefone\" = :telefone,
            \"Data_Nascimento\" = :data_nascimento,
            \"Status\" = :status
            WHERE \"ID_Paciente\" = :id";

    $sentenca = $conexao->prepare($sql);

    $sentenca->bindParam(':nome', $nome);
    $sentenca->bindParam(':cpf', $cpf);
    $sentenca->bindParam(':telefone', $telefone);
    $sentenca->bindParam(':data_nascimento', $data_nascimento);
    $sentenca->bindParam(':status', $status);
    $sentenca->bindParam(':id', $id);

    $sentenca->execute();
}

?>