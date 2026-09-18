<?php

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



    function getConsultas() {

        $conexao = getConnection();

        $sql = "SELECT c.\"ID_Consulta\", c.\"Data_Hora\", c.\"Diagnostico\", c.\"Gravidade\",
                       c.\"ID_Medico\", c.\"ID_Paciente\",
                       m.\"Nome\" AS \"Nome_Medico\",
                       p.\"Nome\" AS \"Nome_Paciente\"
                FROM consulta c
                JOIN medico m ON m.\"ID_Medico\" = c.\"ID_Medico\"
                JOIN paciente p ON p.\"ID_Paciente\" = c.\"ID_Paciente\"
                ORDER BY c.\"ID_Consulta\" DESC";

        $sentenca = $conexao->query($sql);

        $dados = $sentenca->fetchAll(PDO::FETCH_ASSOC);

        return $dados;

    }



    function getConsultaPorId($id) {

        $conexao = getConnection();

        $sql = "SELECT * FROM consulta WHERE \"ID_Consulta\" = :id";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindParam(':id', $id);

        $sentenca->execute();

        return $sentenca->fetch(PDO::FETCH_ASSOC);

    }



    function getMedicos() {

        $conexao = getConnection();

        $sql = "SELECT \"ID_Medico\", \"Nome\" FROM medico ORDER BY \"Nome\"";

        $sentenca = $conexao->query($sql);

        return $sentenca->fetchAll(PDO::FETCH_ASSOC);

    }



    function getPacientes() {

        $conexao = getConnection();

        $sql = "SELECT \"ID_Paciente\", \"Nome\" FROM paciente ORDER BY \"Nome\"";

        $sentenca = $conexao->query($sql);

        return $sentenca->fetchAll(PDO::FETCH_ASSOC);

    }



    function insertConsulta($dados) {

        $conexao = getConnection();

        $data_hora = $dados['data_hora'];

        $diagnostico = $dados['diagnostico'];

        $id_medico = $dados['id_medico'];

        $id_paciente = $dados['id_paciente'];

        $gravidade = $dados['gravidade'];

        $sql = "INSERT INTO consulta
                (\"Data_Hora\", \"Diagnostico\", \"ID_Medico\", \"ID_Paciente\", \"Gravidade\")
                VALUES (:data_hora, :diagnostico, :id_medico, :id_paciente, :gravidade)";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindParam(':data_hora', $data_hora);

        $sentenca->bindParam(':diagnostico', $diagnostico);

        $sentenca->bindParam(':id_medico', $id_medico);

        $sentenca->bindParam(':id_paciente', $id_paciente);

        $sentenca->bindParam(':gravidade', $gravidade);

        $sentenca->execute();

    }



    function updateConsulta($id, $dados) {

        $conexao = getConnection();

        $data_hora = $dados['data_hora'];

        $diagnostico = $dados['diagnostico'];

        $id_medico = $dados['id_medico'];

        $id_paciente = $dados['id_paciente'];

        $gravidade = $dados['gravidade'];

        $sql = "UPDATE consulta SET
                \"Data_Hora\" = :data_hora,
                \"Diagnostico\" = :diagnostico,
                \"ID_Medico\" = :id_medico,
                \"ID_Paciente\" = :id_paciente,
                \"Gravidade\" = :gravidade
                WHERE \"ID_Consulta\" = :id";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindParam(':data_hora', $data_hora);

        $sentenca->bindParam(':diagnostico', $diagnostico);

        $sentenca->bindParam(':id_medico', $id_medico);

        $sentenca->bindParam(':id_paciente', $id_paciente);

        $sentenca->bindParam(':gravidade', $gravidade);

        $sentenca->bindParam(':id', $id);

        $sentenca->execute();

    }



    function deleteConsulta($id) {

        $conexao = getConnection();

        $sql = "DELETE FROM consulta WHERE \"ID_Consulta\" = :id";

        $sentenca = $conexao->prepare($sql);

        $sentenca->bindParam(':id', $id);

        $sentenca->execute();

    }

?>
