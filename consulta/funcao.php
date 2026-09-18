<?php
    function getConnection() {
        $host = 'localhost';
        $port = '5432';
        $dbname = 'hospital'; /* Mude para o nome do seu banco */
        $user = 'postgres';
        $password = 'postgresql'; /* Sua senha do banco */
        
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

    function getConsultas() {
        $conexao = getConnection();
        $sql = "SELECT * FROM consulta ORDER BY id DESC";
        $sentenca = $conexao->query($sql);
        $dados = $sentenca->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    function getConsultaById($id) {
        $conexao = getConnection();
        $sql = "SELECT * FROM consulta WHERE id=:id";
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindParam(':id', $id);
        $sentenca->execute();
        $dados = $sentenca->fetch(PDO::FETCH_ASSOC);      
        return $dados;
    }

    function insertConsulta($dados) {
        $conexao = getConnection();
        $data_hora = $dados['data_hora'];
        $diagnostico = $dados['diagnostico'];
        $id_medico = $dados['id_medico'];
        $id_paciente = $dados['id_paciente'];
        $gravidade = $dados['gravidade'];

        $sql = "INSERT INTO consulta (data_hora, diagnostico, id_medico, id_paciente, gravidade) 
                VALUES (:data_hora, :diagnostico, :id_medico, :id_paciente, :gravidade)";
        
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindParam(':data_hora', $data_hora);
        $sentenca->bindParam(':diagnostico', $diagnostico);
        $sentenca->bindParam(':id_medico', $id_medico);
        $sentenca->bindParam(':id_paciente', $id_paciente);
        $sentenca->bindParam(':gravidade', $gravidade);
        $sentenca->execute();
    }

    function updateConsulta($dados) {
        $conexao = getConnection();
        $data_hora = $dados['data_hora'];
        $diagnostico = $dados['diagnostico'];
        $id_medico = $dados['id_medico'];
        $id_paciente = $dados['id_paciente'];
        $gravidade = $dados['gravidade'];
        $id = $dados['id'];

        $sql = "UPDATE consulta SET data_hora=:data_hora, diagnostico=:diagnostico, 
                id_medico=:id_medico, id_paciente=:id_paciente, gravidade=:gravidade 
                WHERE id=:id";
        
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
        $sql = "DELETE FROM consulta WHERE id=:id";
        $sentenca = $conexao->prepare($sql);
        $sentenca->bindParam(':id', $id);
        $sentenca->execute();
    }
?>
