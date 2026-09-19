<?php

$id_medico = $_GET['id_medico'];

include "funcao.php";

deleteMedico($id_medico);

header('location: medicos.php');

?>