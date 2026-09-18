<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include "funcao.php";
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body class="container">
    <div class='d-flex justify-content-between mt-3 mb-3'>
      <h1>Consultas</h1>
      <a class="btn btn-secondary align-self-center" href="index.php">Voltar</a>
    </div>

    <a class="btn btn-primary" href="formulario_consulta.php">Nova Consulta</a>

    <?php
        $consultas = getConsultas();

        foreach($consultas as $consulta) {
            $id = $consulta['id'];
            $data_hora = $consulta["data_hora"];
            $diagnostico = $consulta["diagnostico"];
            $id_medico = $consulta["id_medico"];
            $id_paciente = $consulta["id_paciente"];
            $gravidade = $consulta["gravidade"];
            
            echo "
            <div class='card mt-3'>
                <div class='card-body'>
                    <h5 class='card-title'>Consulta #$id - Data: $data_hora</h5>
                    <p class='card-text'>
                        <strong>Médico (ID):</strong> $id_medico <br>
                        <strong>Paciente (ID):</strong> $id_paciente <br>
                        <strong>Gravidade:</strong> $gravidade <br>
                        <strong>Diagnóstico:</strong> $diagnostico
                    </p>
                    <a href='editar_consulta.php?id=$id' class='btn btn-primary'>Editar</a>
                    <a href='excluir_consulta.php?id=$id' class='btn btn-danger'>Excluir</a>
                </div>
            </div>
            ";
        }
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script>
        let botoes = document.querySelectorAll('.btn-danger');
        botoes.forEach( botao => botao.addEventListener('click', function(event) {
            let resposta = confirm('Deseja realmente apagar este registro?');
            if (!resposta) {
                event.preventDefault();
            }
        }));
      </script>
  </body>
</html>
