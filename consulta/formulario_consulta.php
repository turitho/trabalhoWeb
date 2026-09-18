<?php
  include_once "gravidade_consulta.php";
  if(!isset($dados)){
      $dados = array('id' => '', 'data_hora' => '', 'diagnostico' => '', 'id_medico' => '', 'id_paciente' => '', 'gravidade' => '');
  }
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário de Consulta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
  <body class="container mt-3">
  <h1>Formulário de Consulta</h1>
    <form action="salvar_consulta.php" method="post">
       <div class="mb-3">
            <label class='form-label'>ID</label>
            <input class='form-control' readonly type="text" id="id" name="id" value="<?php echo $dados['id']; ?>">
        </div>
        <div class="mb-3">
            <label class='form-label'>Data e Hora (Formato: YYYY-MM-DD HH:MM:SS)</label>
            <input class='form-control' type="text" id="data_hora" name="data_hora" value="<?php echo $dados['data_hora']; ?>">
        </div>
        <div class="mb-3">
            <label class='form-label'>ID do Médico</label>
            <input class='form-control' type="text" id="id_medico" name="id_medico" value="<?php echo $dados['id_medico']; ?>">
        </div>
        <div class="mb-3">
            <label class='form-label'>ID do Paciente</label>
            <input class='form-control' type="text" id="id_paciente" name="id_paciente" value="<?php echo $dados['id_paciente']; ?>">
        </div>
        
        <div class="mb-3">
            <label class='form-label'>Gravidade</label>
            <select class='form-control' id="gravidade" name="gravidade">
                <?php foreach (GravidadeConsulta::cases() as $g): ?>
                    <option value="<?php echo $g->value; ?>" <?php echo ($dados['gravidade'] == $g->value) ? 'selected' : ''; ?>>
                        <?php echo $g->value; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class='form-label'>Diagnóstico</label>
            <textarea rows='5' class='form-control' id="diagnostico" name="diagnostico"><?php echo $dados['diagnostico']; ?></textarea>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Salvar</button>
            <a class="btn btn-secondary" href="consultas.php">Cancelar</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>
