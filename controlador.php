<?php

// Incluir las clases MySQL y Consulta
include 'MySQL.php';
include 'consulta.php';

// Conectamos con la base de datos

$conexion = new MySQL("admin", "admin", "192.168.0.28", "campions");
echo (string) '$conexion';

//
$jugadores; $batallas; $campeones;
$post;

//
$jugadorArgs = array(
    'id'        => FILTER_SANITIZE_ENCODED,
    'nombre'    => FILTER_SANITIZE_ENCODED,
    'nivel'     => FILTER_SANITIZE_ENCODED,
    'fecha'     => FILTER_SANITIZE_ENCODED,
);

$campioArgs = array(
    'id'        => FILTER_SANITIZE_ENCODED,
    'nombre'    => FILTER_SANITIZE_ENCODED,
    'tipo'      => FILTER_SANITIZE_ENCODED,
    'precio'    => FILTER_SANITIZE_ENCODED,
    'fecha'     => FILTER_SANITIZE_ENCODED,
);

$batallaArgs = array(
    'idJ'        => FILTER_SANITIZE_ENCODED,
    'idC'        => FILTER_SANITIZE_ENCODED,
    'cantidad'   => FILTER_SANITIZE_ENCODED,
);

// 

$post = filter_input_array(INPUT_POST, $jugadorArgs);
echo "Hello World: ".$post[];
?>