<?php
    $id = $_GET['id'];

    include "funcao.php";

    deleteConsulta($id);

    header('location: consultas.php');
?>
