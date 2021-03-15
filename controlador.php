<?php

// Incluir las clases MySQL y Consulta
include 'MySQL.php';
include 'consulta.php';

// Conectamos con la base de datos

$bd = new MySQL("admin", "admin", "192.168.0.28", "campions");

// Filtramos las variables pasadas por POST (si existen)

// Comprovamos si hemos accedido a traves de formulario para realizar acción

// Obtenemos todos los datos de la BD

$post = array (   "jugador" => array (  'id'        => FILTER_SANITIZE_ENCODED,
                                        'nombre'    => FILTER_SANITIZE_ENCODED,
                                        'nivel'     => FILTER_SANITIZE_ENCODED,
                                        'fecha'     => FILTER_SANITIZE_ENCODED,
                                     ),
                  "campeon" => array (  'id'        => FILTER_SANITIZE_ENCODED,
                                        'nombre'    => FILTER_SANITIZE_ENCODED,
                                        'tipo'      => FILTER_SANITIZE_ENCODED,
                                        'precio'    => FILTER_SANITIZE_ENCODED,
                                        'fecha'     => FILTER_SANITIZE_ENCODED,
                                     ),
                  "batalla" => array (  'idJ'       => FILTER_SANITIZE_ENCODED,
                                        'idC'       => FILTER_SANITIZE_ENCODED,
                                        'cantidad'  => FILTER_SANITIZE_ENCODED,
                                     )
                );
global $post;

if(!empty($_POST)){
    accion($post, $bd);
}

// 
function accion ($post, $bd){
    switch ($_POST["form"]) {
        case "jugador":
            switch ($_POST["accion"]) {
                case "crear":
                    $post = filter_input_array(INPUT_POST, $post["jugador"]);
                    insertJugador($post,$bd);
                    break;
                case "modificar":
                    $post = filter_input_array(INPUT_POST, $post["jugador"]);
                    updateJugador($post,$bd);
                    break;
                case "eliminar":
                    $post = filter_input_array(INPUT_POST, $post["jugador"]);
                    deleteJugador($post,$bd);
                    break;
            }
            break;
        case "campio":
            switch ($_POST["accion"]) {
                case "crear":
                    $post = filter_input_array(INPUT_POST, $post["campeon"]);
                    insertCampeon($post,$bd);
                    break;
                case "modificar":
                    $post = filter_input_array(INPUT_POST, $post["campeon"]);
                    updateCampeon($post,$bd);
                    break;
                case "eliminar":
                    $post = filter_input_array(INPUT_POST, $post["campeon"]);
                    deleteCampeon($post,$bd);
                    break;
            }
            break;
        case "batalla":
            switch ($_POST["accion"]) {
                case "crear":
                    $post = filter_input_array(INPUT_POST, $post["batalla"]);
                    insertBatalla($post,$bd);
                    break;
                case "modificar":
                    $post = filter_input_array(INPUT_POST, $post["batalla"]);
                    updateBatalla($post,$bd);
                    break;
                case "eliminar":
                    $post = filter_input_array(INPUT_POST, $post["batalla"]);
                    deleteCampeon($post,$bd);
                    break;
            }
            break;  
    }  
}

// GET ALL: Obtener todos los registros de una tabla
function getAllJugadores( $bd ) {
    /* query= select * from jugador, entonces le paso query y bd*/
    $consulta = new Consulta("SELECT * FROM jugador", $bd);

    /* Esto lo puedo hacer aqui o lo puedo hacer en campions.php */
    echo "<table class='tableJugador'>";
    echo '<tr><th>Id</th><th>Nom</th><th>Nivell</th><th>Data</th></tr>';
    for ($i = 0; $i < $consulta->numFilasObtenidas; $i++) {
        echo "<tr>";
        echo "<td>".$consulta->tablaResultados[$i]->id."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->nombre."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->nivel."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->fecha."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function getAllCampeones( $bd ) {
    $consulta = new Consulta("SELECT * FROM batalla", $bd);

    echo "<table class='tableBatalla'>";
    echo '<tr><th>IdJugador</th><th>IdCampeón</th><th>Cantidad</th></tr>';
    for ($i = 0; $i < $consulta->numFilasObtenidas; $i++) {
        echo "<tr>";
        echo "<td>".$consulta->tablaResultados[$i]->idJugador."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->idCampeon."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->cantidad."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function getAllBatallas ( $bd ) {
    $consulta = new Consulta("SELECT * FROM campeon", $bd);

    echo "<table class='tableCampeon'>";
    echo '<tr><th>Id</th><th>Nom</th><th>Tipus</th><th>Preu</th><th>Data</th></tr>';
    for ($i = 0; $i < $consulta->numFilasObtenidas; $i++) {
        echo "<tr>";
        echo "<td>".$consulta->tablaResultados[$i]->id."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->nombre."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->tipo."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->precio."</td>";
        echo "<td>".$consulta->tablaResultados[$i]->fecha."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// INSERT: Insertar un nuevo registro en una tabla
function insertJugador ( $j,  $bd ) {
    $id=$j['id'];
    $nombre=$j['nombre'];
    $nivel=(int)$j['nivel'];
    $fecha=$j['fecha'];

    if (!empty($id)){
        $consulta = "INSERT INTO jugador (id, nombre, nivel, fecha) VALUES ('$id', '$nombre', '$nivel', '$fecha')";
        new Consulta($consulta, $bd);
    }
}

function insertCampeon ( $c,  $bd ) {
    $id=$c['id'];
    $nombre=$c['nombre'];
    $tipo=$c['tipo'];
    $precio=(int)$c['precio'];
    $fecha=$c['fecha'];

    if (!empty($id)) {
        $consulta = "INSERT INTO campeon (id, nombre, tipo, precio, fecha) VALUES ('$id', '$nombre', '$tipo', '$precio', '$fecha')";
        new Consulta($consulta, $bd);
    }
    
}

function insertBatalla ( $b,  $bd ) {
    $idJugador=$b['idJ'];
    $idCampeon=$b['idC'];
    $cantidad=(int)$b['cantidad'];

    if (!empty($id)) {
        $consulta = "INSERT INTO batalla (idJugador, idCampeon, cantidad) VALUES ('$idJugador', '$idCampeon', '$cantidad')";
        new Consulta($consulta, $bd);
    }
}

// UPDATE: Actualizar/Modificar los datos guardados de un registro
function updateJugador ( $j,  $bd ) {
    $id=$j['id'];
    $nombre=$j['nombre'];
    $nivel=(int)$j['nivel'];
    $fecha=$j['fecha'];

    if (!empty($id)) {
        $consulta = "UPDATE jugador SET nombre='$nombre', nivel='$nivel', fecha='$fecha' WHERE id=$id";
        new Consulta($consulta, $bd);
    }
}

function updateCampeon ( $c,  $bd ) {
    $id=$c['id'];
    $nombre=$c['nombre'];
    $tipo=$c['tipo'];
    $precio=(int)$c['precio'];
    $fecha=$c['fecha'];

    if (!empty($id)) {
        $consulta = "UPDATE campeon SET nombre='$nombre', tipo='$tipo', precio='$precio', fecha='$fecha' WHERE id=$id";
        new Consulta($consulta, $bd);
    }
}

function updateBatalla ( $b,  $bd ) {
    $idJ=$b['idJ'];
    $idC=$b['idC'];
    $cantidad=(int)$b['cantidad'];
    
    if (!empty($id)) {
        $consulta = "UPDATE batalla SET cantidad='$cantidad' WHERE idJugador='$idJ' AND idCampeon='$idC'";
        new Consulta($consulta, $bd);
    }
}

// DELETE: Eliminar un registro de una tabla
function deleteJugador ( $j,  $bd ) {
    $id=$j['id'];
    if (!empty($id)) {
        $consulta = "DELETE FROM jugador WHERE id=$id";
        new Consulta ($consulta,$bd);
    }
}

function deleteCampeon ( $c,  $bd ) {
    $id=$c['id'];
    if (!empty($id)) {
        $consulta = "DELETE FROM jugador WHERE id=$id";
        new Consulta ($consulta,$bd);
    }
}

function deleteBatalla ( $b,  $bd ) {
    $idJ=$b['idJ'];
    $idC=$b['idC'];
    if (!empty($idJ) || !empty($idC)) {
        $consulta = "DELETE FROM batalla WHERE idJugador='$idJ' AND idCampeon='$idC'";
        new Consulta($consulta, $bd);
    }
}

//No se porque esta vaina no me funciona (pero se que es para cerrar la conexión)
//$bd->x;


// Cerramos sesion con la BD utilizando una función de la clase MySQL
//$bd->x;


?>