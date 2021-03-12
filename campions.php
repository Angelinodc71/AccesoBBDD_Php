<?php
    include 'controlador.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Campions</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styleGestor.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=DotGothic16&display=swap" rel="stylesheet">
        <script src=""></script>
    </head>
    <body>
	<header>
            <h1>Gestor Campions</h1>
	</header>
	<section>
            <div class="crearModificarJugador">
                <h3>Crear/Modificar Jugador</h3>
                <form action="campions.php" method="post">
                    <input type="hidden" name="form" value="jugador">
                    <input type="text" name="id" placeholder="Id" /><br /><br />
                    <input type="text" name="nombre" placeholder="Nom"/><br /><br />
                    <input type="number" name="nivel" placeholder="Nivell"/><br /><br />
                    <input type="date" name="fecha" placeholder="Data alta" /><br /><br />
                    <div class="crearModificarAceptar"><label><input type="radio" name="accion" value="crear" checked> Crear</label><br />
                    <label><input type="radio" name="accion" value="modificar"> Modificar<br /></label><br />
                    <input type="submit" value="Aceptar" name="btnJugador" class="btnAceptar"></div>
                </form>
                
            </div>
            <div class="crearModificarCampio">
                <h3>Crear/Modificar Campió</h3>
                <form action="campions.php" method="post">
                    <input type="hidden" name="form" value="campio">
                    <input type="text" name="id" placeholder="Id"/><br /><br />
                    <input type="text" name="nombre" placeholder="Nom"/><br /><br />
                    <input type="text" name="tipo" placeholder="Tipus"/><br /><br />
                    <input type="number" name="precio" placeholder="Preu" /><br /><br />
                    <input type="date" name="fecha" placeholder="Data alta" /><br /><br />
                    <div class="crearModificarAceptar"><label><input type="radio" name="accion" value="crear" checked> Crear</label><br />
                    <label><input type="radio" name="accion" value="modificar"> Modificar<br /></label><br />
                    <input type="submit" value="Aceptar" class="btnAceptar"></div>
                </form>
            </div>
            <div class="crearModificarBatalla">
                <h3>Crear / Modificar Batalla</h3>
                <form action="campions.php" method="post">
                    <input type="hidden" name="form" value="batalla">
                    <input type="text" name="idJ" placeholder="Id jugador"/><br /><br />
                    <input type="text" name="idC" placeholder="Id Campió"/><br /><br />
                    <input type="number" name="cantidad" placeholder="Cantitat" /><br /><br />
                    <div class="crearModificarAceptar"><label><input type="radio" name="accion" value="crear" checked> Crear</label><br />
                    <label><input type="radio" name="accion" value="modificar"> Modificar<br /></label><br />
                    <input type="submit" value="Aceptar" class="btnAceptar"></div>
                </form>
            </div>
            <div class="eliminar">
                <h3>Eliminar</h3>
                <form action="campions.php" method="post">
                    <input type="hidden" name="form" value="jugador">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="text" name="id" placeholder="Id jugador"/><br />
                    <input type="submit" value="Eliminar"><br>
                </form>
                <form action="campions.php" method="post">
                    <input type="hidden" name="form" value="campio">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="text" name="id" placeholder="Id campió"/><br />
                    <input type="submit" value="Eliminar"><br>
                </form>
                <form action="campions.php" method="post">
                    <input type="hidden" name="form" value="batalla">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="text" name="idJ" placeholder="Id jugador"/><br /><br />
                    <input type="text" name="idC" placeholder="Id campió"/><br /><br />
                    <input type="submit" value="Eliminar">
                </form>
            </div>
	</section>
    <aside>
        <?php
            echo "<div class='tablesContainer'>";
                echo "<div class='jugadores'><h2>Jugadores</h2>";
                getAllJugadores($bd);
                echo "</div>";

                echo "<div class='campeones'><h2>Campeones</h2>";
                getAllBatallas($bd);
                echo "</div>";
                
                echo "<div class='batallas'><h2>Batallas</h2>";
                getAllCampeones($bd);
                echo "</div>";
            echo "</div>";
        ?>
    </aside>
    </body>
</html>