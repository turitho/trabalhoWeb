<?php
    include "funcao.php";

    $id = $_GET['id'];

    $dados = getConsultaById($id);

    include "formulario_consulta.php";
?>
