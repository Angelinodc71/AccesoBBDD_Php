<?php

// Incluir las clases MySQL y Consulta
include 'MySQL.php';
include 'consulta.php';

// Conectamos con la base de datos

$bd = new MySQL("admin", "admin", "192.168.0.28", "campions");

// Filtramos las variables pasadas por POST (si existen)
$jugadores; $batallas; $campeones;
$post;

// Comprovamos si hemos accedido a traves de formulario para realizar acción

// Obtenemos todos los datos de la BD
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

// query= select * from jugador, entonces le paso query y bd
$consulta = new Consulta("SELECT * FROM jugador", $bd);

// Esto lo puedo hacer aqui o lo puedo hacer en campions.php
echo "<table class='tableJugador'>";
echo '<tr><td>Id</td><td>Nom</td><td>Nivell</td><td>Data</td></tr>';
for ($i = 0; $i < $consulta->numFilasObtenidas; $i++) {
    echo "<tr><td>".$consulta->tablaResultados[$i]->id."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->nombre."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->nivel."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->fecha."</td></tr>";
}
echo "</table>";

$consulta = new Consulta("SELECT * FROM batalla", $bd);

echo "<table class='tableBatalla'>";
echo '<tr><td>Id Jugador</td><td>Id Campeón</td><td>Cantidad</td></tr>';
for ($i = 0; $i < $consulta->numFilasObtenidas; $i++) {
    echo "<tr><td>".$consulta->tablaResultados[$i]->idJugador."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->idCampeon."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->cantidad."</td></tr>";
}
echo "</table>";


$consulta = new Consulta("SELECT * FROM campeon", $bd);

echo "<table class='tableCampeon'>";
echo '<tr><td>Id</td><td>Nom</td><td>Tipus</td><td>Preu</td><td>Data</td></tr>';
for ($i = 0; $i < $consulta->numFilasObtenidas; $i++) {
    echo "<tr><td>".$consulta->tablaResultados[$i]->id."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->nombre."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->tipo."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->precio."</td>";
    echo "<td>".$consulta->tablaResultados[$i]->fecha."</td></tr>";
}
echo "</table>";



//No se porque esta vaina no me funciona
//$bd->x;


// Cerramos sesion con la BD utilizando una función de la clase MySQL


/*if(!empty($_POST)){
    accion($post, $bd);
}

// 
function accion ($post, $bd){
    global $jugadorArgs; global $batallaArgs; global $campioArgs;

    switch ($_POST["form"]) {
        case "jugador":
            $post = filter_input_array(INPUT_POST, $jugadorArgs);
            if($_POST["accion"] == 'crear') insertJugador($post, $bd);
            break;
    }
}

function insertJugador($j, $bd){
    $id=$j['id'];
    $nombre=$j['nombre'];
    $nivel=(int)$j['nivel'];
    $fecha=$j['fecha'];

    $consulta = "INSERT INTO jugador (id, nombre, nivel, fecha) VALUES ('$id', '$nombre', '$nivel', '$fecha')";
    $j = new Consulta($consulta, $bd);
    $bd->x;
}*/

//$post = filter_input_array(INPUT_POST, $jugadorArgs);

?>