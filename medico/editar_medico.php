<?php

include "funcao.php";

$id_medico = $_GET['id_medico'];

$dados = getMedicoById($id_medico);

include "formulario_medico.php";

?>